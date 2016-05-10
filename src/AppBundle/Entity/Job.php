<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\JobRepository")
 * @ORM\Table(name="job")
 * @ORM\HasLifecycleCallbacks()
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=False)
     */
    protected $name;

    /**
     * @ORM\PrePersist
     */
    public function generateName()
    {
        $this->setName("Job-".(string)uniqid());
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishdate", type="date", nullable=true)
     * @Assert\DateTime()
     */
    protected $finishdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="launchdate", type="date", nullable=true)
     */
    protected $launchdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submitdate", type="date", nullable=true)
     * @Assert\DateTime()
     */
    protected $submitdate;

    /**
     * @ORM\PrePersist
     */
    public function submitDate()
    {
        $this->setSubmitdate(new \DateTime());
    }

    /**
     * @var \Boolean
     *
     * @ORM\Column(name="finish", type="boolean", nullable=False)
     */
    protected $finish;

    /**
     * @var string
     *
     * @ORM\Column(name="targetformat", type="string", length=100, nullable=False)
     * @Assert\Length(min=3)
     */
    protected $targetformat;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Video", cascade={"persist"})
     * @Assert\Valid()
     **/
    protected $video;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     * @Assert\Valid()
     **/
    protected $user;

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
     * Set name
     *
     * @param string $name
     *
     * @return Job
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set finishdate
     *
     * @param \DateTime $finishdate
     *
     * @return Job
     */
    public function setFinishdate($finishdate)
    {
        $this->finishdate = $finishdate;

        return $this;
    }

    /**
     * Get finishdate
     *
     * @return \DateTime
     */
    public function getFinishdate()
    {
        return $this->finishdate;
    }

    /**
     * Set launchdate
     *
     * @param \DateTime $launchdate
     *
     * @return Job
     */
    public function setLaunchdate($launchdate)
    {
        $this->launchdate = $launchdate;

        return $this;
    }

    /**
     * Get launchdate
     *
     * @return \DateTime
     */
    public function getLaunchdate()
    {
        return $this->launchdate;
    }

    /**
     * Set submitdate
     *
     * @param \DateTime $submitdate
     *
     * @return Job
     */
    public function setSubmitdate($submitdate)
    {
        $this->submitdate = $submitdate;

        return $this;
    }

    /**
     * Get submitdate
     *
     * @return \DateTime
     */
    public function getSubmitdate()
    {
        return $this->submitdate;
    }

    /**
     * Set finish
     *
     * @param boolean $finish
     *
     * @return Job
     */
    public function setFinish($finish)
    {
        $this->finish = $finish;

        return $this;
    }

    /**
     * Get finish
     *
     * @return boolean
     */
    public function getFinish()
    {
        return $this->finish;
    }

    /**
     * Set targetformat
     *
     * @param string $targetformat
     *
     * @return Job
     */
    public function setTargetformat($targetformat)
    {
        $this->targetformat = $targetformat;

        return $this;
    }

    /**
     * Get targetformat
     *
     * @return string
     */
    public function getTargetformat()
    {
        return $this->targetformat;
    }

    /**
     * Set video
     *
     * @param \AppBundle\Entity\Video $video
     *
     * @return Job
     */
    public function setVideo(\AppBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \AppBundle\Entity\Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Job
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
