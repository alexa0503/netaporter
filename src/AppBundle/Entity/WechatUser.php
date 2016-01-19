<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="t_wechat_user")
 */
class WechatUser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="open_id",type="string", length=40)
     */
    protected $openId;
    /**
     * @ORM\Column(name="nick_name",type="string", length=200)
     */
    protected $nickName;
    /**
     * @ORM\Column(name="head_img",type="string", length=200)
     */
    protected $headImg;
    /**
     * @ORM\Column(name="gender", type="boolean")
     */
    protected $gender;
    /**
     * @ORM\Column(name="province",type="string", length=60)
     */
    protected $province;
    /**
     * @ORM\Column(name="city",type="string", length=60)
     */
    protected $city;
    /**
     * @ORM\Column(name="country",type="string", length=60)
     */
    protected $country;
    /**
     * @ORM\Column(name="create_time",type="datetime")
     */
    protected $createTime;
    /**
     * @ORM\Column(name="create_ip",type="string", length=60)
     */
    protected $createIp;
    /**
     * @ORM\OneToOne(targetEntity="Timeline", mappedBy="user")
     */
    protected $timeline;
    /**
     * @ORM\OneToMany(targetEntity="VoteLog", mappedBy="voter")
     */
    protected $voteLogs;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->voteLogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set openId
     *
     * @param string $openId
     * @return WechatUser
     */
    public function setOpenId($openId)
    {
        $this->openId = $openId;

        return $this;
    }

    /**
     * Get openId
     *
     * @return string 
     */
    public function getOpenId()
    {
        return $this->openId;
    }



    /**
     * Set nickName
     *
     * @param string $nickName
     * @return WechatUser
     */
    public function setNickName($nickName)
    {
        $this->nickName = json_encode($nickName);

        return $this;
    }

    /**
     * Get nickName
     *
     * @return string 
     */
    public function getNickName()
    {
        return json_decode($this->nickName);
    }

    /**
     * Set headImg
     *
     * @param string $headImg
     * @return WechatUser
     */
    public function setHeadImg($headImg)
    {
        $this->headImg = $headImg;

        return $this;
    }

    /**
     * Get headImg
     *
     * @return string 
     */
    public function getHeadImg()
    {
        return $this->headImg;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     * @return WechatUser
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set province
     *
     * @param string $province
     * @return WechatUser
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return WechatUser
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return WechatUser
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return WechatUser
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime 
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set createIp
     *
     * @param string $createIp
     * @return WechatUser
     */
    public function setCreateIp($createIp)
    {
        $this->createIp = $createIp;

        return $this;
    }

    /**
     * Get createIp
     *
     * @return string 
     */
    public function getCreateIp()
    {
        return $this->createIp;
    }

    /**
     * Set timeline
     *
     * @param \AppBundle\Entity\Timeline $timeline
     * @return WechatUser
     */
    public function setTimeline(\AppBundle\Entity\Timeline $timeline = null)
    {
        $this->timeline = $timeline;

        return $this;
    }

    /**
     * Get timeline
     *
     * @return \AppBundle\Entity\Timeline 
     */
    public function getTimeline()
    {
        return $this->timeline;
    }

    /**
     * Add logs
     *
     * @param \AppBundle\Entity\VoteLog $logs
     * @return WechatUser
     */
    public function addLog(\AppBundle\Entity\VoteLog $logs)
    {
        $this->logs[] = $logs;

        return $this;
    }

    /**
     * Remove logs
     *
     * @param \AppBundle\Entity\VoteLog $logs
     */
    public function removeLog(\AppBundle\Entity\VoteLog $logs)
    {
        $this->logs->removeElement($logs);
    }

    /**
     * Get logs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * Add voteLogs
     *
     * @param \AppBundle\Entity\VoteLog $voteLogs
     * @return WechatUser
     */
    public function addVoteLog(\AppBundle\Entity\VoteLog $voteLogs)
    {
        $this->voteLogs[] = $voteLogs;

        return $this;
    }

    /**
     * Remove voteLogs
     *
     * @param \AppBundle\Entity\VoteLog $voteLogs
     */
    public function removeVoteLog(\AppBundle\Entity\VoteLog $voteLogs)
    {
        $this->voteLogs->removeElement($voteLogs);
    }

    /**
     * Get voteLogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVoteLogs()
    {
        return $this->voteLogs;
    }
}
