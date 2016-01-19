<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="t_timeline")
 */
class Timeline
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="WechatUser", inversedBy="timeline")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
   /**
     * @ORM\Column(name="title",type="string", length=200)
     */
    protected $title;
   /**
     * @ORM\Column(name="img_url",type="string", length=120)
     */
    protected $imgUrl;
    /**
     * @ORM\Column(name="favour_num",type="integer")
     */
    protected $favourNum;
    /**
     * @ORM\Column(name="week_favour_num",type="integer")
     */
    protected $weekFavourNum;
    /**
     * @ORM\Column(name="update_time",  type="datetime")
     */
    protected $updateTime;
    /**
     * @ORM\Column(name="create_time",  type="datetime")
     */
    private $createTime;
    /**
     * @ORM\Column(name="create_ip", type="string", length=60)
     */
    private $createIp;
    /**
     * @ORM\OneToMany(targetEntity="VoteLog", mappedBy="timeline")
     */
    protected $logs;


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
     * Set title
     *
     * @param string $title
     * @return Timeline
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     * @return Timeline
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string 
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Set favourNum
     *
     * @param integer $favourNum
     * @return Timeline
     */
    public function setFavourNum($favourNum)
    {
        $this->favourNum = $favourNum;

        return $this;
    }

    /**
     * Get favourNum
     *
     * @return integer 
     */
    public function getFavourNum()
    {
        return $this->favourNum;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return Timeline
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
     * @return Timeline
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
     * Set user
     *
     * @param \AppBundle\Entity\WechatUser $user
     * @return Timeline
     */
    public function setUser(\AppBundle\Entity\WechatUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\WechatUser 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set weekFavourNum
     *
     * @param integer $weekFavourNum
     * @return Timeline
     */
    public function setWeekFavourNum($weekFavourNum)
    {
        $this->weekFavourNum = $weekFavourNum;

        return $this;
    }

    /**
     * Get weekFavourNum
     *
     * @return integer 
     */
    public function getWeekFavourNum()
    {
        return $this->weekFavourNum;
    }

    /**
     * Set updateTime
     *
     * @param \DateTime $updateTime
     * @return Timeline
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime 
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
    public function increaseNum()
    {
        ++$this->favourNum;
        ++$this->weekFavourNum;
        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add logs
     *
     * @param \AppBundle\Entity\VoteLog $logs
     * @return Timeline
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
}
