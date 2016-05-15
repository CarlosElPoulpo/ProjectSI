<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideoRepository")
 * @ORM\Table(name="video")
 * @ORM\HasLifecycleCallbacks()
 */
class Video
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
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @Assert\File(
     *     maxSize = "500M",
     *     mimeTypes = {"video/mp4", "video/avi", "video/mpeg"},
     *     mimeTypesMessage = "ce format de video est inconnu",
     * )
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=100, nullable=False)
     * @Assert\Length(min=3)
     */
    protected $format;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=False)
     */
    protected $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=False)
     * @Assert\Length(min=3)
     */
    protected $duration;

    private $temp;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old video path
        if (isset($this->url)) {
            // store the old name to delete after the update
            $this->temp = $this->url;
            $this->url = null;
        } else {
            $this->url = 'initial';
        }
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->format = $this->file->guessExtension();
            $this->duration = $this->findDuration();
            $this->size = filesize($this->file);
            $this->url = $filename.'.'.$this->format;
        }
    }

    public function findDuration(){
        /*ob_start();
        passthru("ffmpeg -i working_copy.flv  2>&1");
        $duration = ob_get_contents();
        $full = ob_get_contents();
        ob_end_clean();
        $search = "/duration.*?([0-9]{1,})/";
        print_r($duration);
        $duration = preg_match($search, $duration, $matches, PREG_OFFSET_CAPTURE, 3);
        print_r('<pre>');
        print_r($matches[1][0]);
        print_r($full);*/

        /*$ffprobe = $this->get('dubture_ffmpeg.ffprobe');
        $ffprobe
            ->format('/path/to/video/mp4') // extracts file informations
            ->get('duration');*/
        $duration = 4;
        return $duration;
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->url);

        // check if we have an old video
        if (isset($this->temp)) {
            // delete the old video
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp video path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * Called before entity removal
     *
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsoluteUrl()) {
            unlink($file);
        }
    }

    public function getAbsoluteUrl()
    {
        return null === $this->url
            ? null
            : $this->getUploadRootDir().'/'.$this->url;
    }

    public function getWebUrl()
    {
        return null === $this->url
            ? null
            : $this->getUploadDir().'/'.$this->url;
    }

    public function getUploadDir()
    {
        return 'uploads/fortranscode/videos';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
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
     * Set url
     *
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function __toString()
    {
        return $this->url;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Video
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Video
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Video
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
