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
     * @var \DateTime
     *
     * @ORM\Column(name="finishDate", type="date", nullable=true)
     * @Assert\DateTime()
     */
    protected $finishDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="launchDate", type="date", nullable=true)
     */
    protected $launchDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submitDate", type="date", nullable=true)
     * @Assert\DateTime()
     */
    protected $submitDate;

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function createDate()
    {
        $this->setSubmitDate(new \DateTime());
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
     * @ORM\Column(name="targetFormat", type="string", length=100, nullable=False)
     * @Assert\Length(min=3)
     */
    protected $targetFormat;

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
     * Set finishDate
     *
     * @param \DateTime $finishDate
     *
     * @return Job
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * Get finishDate
     *
     * @return \DateTime
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * Set launchDate
     *
     * @param \DateTime $launchDate
     *
     * @return Job
     */
    public function setLaunchDate($launchDate)
    {
        $this->launchDate = $launchDate;

        return $this;
    }

    /**
     * Get launchDate
     *
     * @return \DateTime
     */
    public function getLaunchDate()
    {
        return $this->launchDate;
    }

    /**
     * Set submitDate
     *
     * @param \DateTime $submitDate
     *
     * @return Job
     */
    public function setSubmitDate($submitDate)
    {
        $this->submitDate = $submitDate;

        return $this;
    }

    /**
     * Get submitDate
     *
     * @return \DateTime
     */
    public function getSubmitDate()
    {
        return $this->submitDate;
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
     * Set targetFormat
     *
     * @param string $targetFormat
     *
     * @return Job
     */
    public function setTargetFormat($targetFormat)
    {
        $this->targetFormat = $targetFormat;

        return $this;
    }

    /**
     * Get targetFormat
     *
     * @return string
     */
    public function getTargetFormat()
    {
        return $this->targetFormat;
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

    public function generateName()
    {
        return "Job-".(string)$this->getId();
    }
}
