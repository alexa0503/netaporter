<?php
namespace AppBundle\Controller;

//use AppBundle\Wechat\Wechat;
use Foo\Bar\B;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Filesystem\Filesystem;
use AppBundle\Helper;
use AppBundle\Entity;
#use Imagine\Gd\Imagine;
#use Imagine\Image\Box;
#use Imagine\Image\Point;
#use Imagine\Image\ImageInterface;
#use Symfony\Component\Validator\Constraints\Image;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="_index")
	 */
	public function indexAction(Request $request)
	{
        $session = $request->getSession();
        $session->set('wechat_title','测试你的2016时尚关键词，收获一整年的时尚!');
        $session->set('wechat_desc','时尚的你这一年该怎么过？快来看看你的时尚关键词是什么！');
        $user = $this->getDoctrine()->getRepository('AppBundle:WechatUser')->find($session->get('user_id'));
        return $this->render('AppBundle:default:index.html.twig',array('user'=>$user));
	}
    /**
     * @Route("/update", name="_update")
     */
    public function updateAction(Request $request)
    {
        if( null != $request->get('birthDate')){
            $em = $this->getDoctrine()->getManager();
            $wechat_user = $this->getRepository('AppBundle:WechatUser')->find($session->get('user_id'));
            $wechat_user->setBirthDate(new \DateTime($request->get('birthDate')));
            $em->persist($wechat_user);
            $em->flush();
        }
        $return = array('ret'=>0,'msg'=>'');
        return new Response('');
    }


	/**
	 * @Route("callback/", name="_callback")
	 */
  public function wechatAction(Request $request)
  {
    $session = $request->getSession();
    $code = $request->query->get('code');
    //$state = $request->query->get('state');
    $app_id = $this->container->getParameter('wechat_appid');
    $secret = $this->container->getParameter('wechat_secret');
    //$url = "https://app.jingsocial.com/api/wechat/accessToken?appid=" . $app_id . "&secret=".$secret;
    $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $app_id . "&secret=" . $secret . "&code=$code&grant_type=authorization_code";
    $data = Helper\HttpClient::get($url);
    //var_dump($data,$url);
    $token = json_decode($data);
    //$session->set('open_id', null);
    if ( isset($token->errcode) && $token->errcode != 0) {
        return new Response('something bad !');
    }

    $wechat_token = $token->access_token;
    $wechat_openid = $token->openid;
    $url = "https://api.weixin.qq.com/sns/userinfo?access_token={$wechat_token}&openid={$wechat_openid}";
    $data = Helper\HttpClient::get($url);
    $user_data = json_decode($data);

    $em = $this->getDoctrine()->getManager();
    $em->getConnection()->beginTransaction();
    try{
        $session->set('open_id', $user_data->openid);
        $repo = $em->getRepository('AppBundle:WechatUser');
        $qb = $repo->createQueryBuilder('a');
        $qb->select('COUNT(a)');
        $qb->where('a.openId = :openId');
        $qb->setParameter('openId', $user_data->openid);
        $count = $qb->getQuery()->getSingleScalarResult();
        if($count <= 0){
            $wechat_user = new Entity\WechatUser();
            $wechat_user->setOpenId($wechat_openid);
            $wechat_user->setNickName($user_data->nickname);
            $wechat_user->setCity($user_data->city);
            $wechat_user->setGender($user_data->sex);
            $wechat_user->setProvince($user_data->province);
            $wechat_user->setCountry($user_data->country);
            $wechat_user->setHeadImg($user_data->headimgurl);
            $wechat_user->setCreateIp($request->getClientIp());
            $wechat_user->setCreateTime(new \DateTime('now'));
            $em->persist($wechat_user);
            $em->flush();
        }
        else{
            $wechat_user = $em->getRepository('AppBundle:WechatUser')->findOneBy(array('openId' => $wechat_openid));
        }
        $session->set('user_id', $wechat_user->getId());

        $redirect_url = $session->get('redirect_url') == null ? $this->generateUrl('_index') : $session->get('redirect_url');
        $em->getConnection()->commit();
        return $this->redirect($redirect_url);
    }
    catch (Exception $e) {
        $em->getConnection()->rollback();
        return new Response($e->getMessage());
    }
  }
}
