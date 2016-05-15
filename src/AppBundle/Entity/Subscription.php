<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubscriptionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Subscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="priceperhour", type="float")
     */
    private $priceperhour;

    /**
     * @var bool
     *
     * @ORM\Column(name="billedmonthly", type="boolean")
     */
    private $billedmonthly;

    /**
     * Get id
     *
     * @return int
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
     * @return Subscription
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
     * Set priceperhour
     *
     * @param float $priceperhour
     *
     * @return Subscription
     */
    public function setPriceperhour($priceperhour)
    {
        $this->priceperhour = $priceperhour;

        return $this;
    }

    /**
     * Get priceperhour
     *
     * @return float
     */
    public function getPriceperhour()
    {
        return $this->priceperhour;
    }

    /**
     * Set billedmonthly
     *
     * @param boolean $billedmonthly
     *
     * @return Subscription
     */
    public function setBilledmonthly($billedmonthly)
    {
        $this->billedmonthly = $billedmonthly;

        return $this;
    }

    /**
     * Get billedmonthly
     *
     * @return bool
     */
    public function getBilledmonthly()
    {
        return $this->billedmonthly;
    }
}

