<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bill
 *
 * @ORM\Table(name="bill")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BillRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Bill
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
     * @var \DateTime
     *
     * @ORM\Column(name="paiddate", type="datetime", nullable=True)
     */
    private $paiddate;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

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
     * Set paiddate
     *
     * @param \DateTime $paiddate
     *
     * @return Bill
     */
    public function setPaiddate($paiddate)
    {
        $this->paiddate = $paiddate;

        return $this;
    }

    /**
     * Get paiddate
     *
     * @return \DateTime
     */
    public function getPaiddate()
    {
        return $this->paiddate;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Bill
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
