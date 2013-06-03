<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdCalendarOrders
 */
class ProdCalendarOrders
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $fromDate;

    /**
     * @var \DateTime
     */
    private $toDate;

    /**
     * @var string
     */
    private $googleUrl;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\ProdOrders
     */
    private $prodOrder;

    /**
     * @var \Production\ProductionBundle\Entity\BackUsersOld
     */
    private $backUser;


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
     * @return ProdCalendarOrders
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
     * Set fromDate
     *
     * @param \DateTime $fromDate
     * @return ProdCalendarOrders
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * Get fromDate
     *
     * @return \DateTime 
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Set toDate
     *
     * @param \DateTime $toDate
     * @return ProdCalendarOrders
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;

        return $this;
    }

    /**
     * Get toDate
     *
     * @return \DateTime 
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * Set googleUrl
     *
     * @param string $googleUrl
     * @return ProdCalendarOrders
     */
    public function setGoogleUrl($googleUrl)
    {
        $this->googleUrl = $googleUrl;

        return $this;
    }

    /**
     * Get googleUrl
     *
     * @return string 
     */
    public function getGoogleUrl()
    {
        return $this->googleUrl;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ProdCalendarOrders
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ProdCalendarOrders
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return ProdCalendarOrders
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set prodOrder
     *
     * @param \Production\ProductionBundle\Entity\ProdOrders $prodOrder
     * @return ProdCalendarOrders
     */
    public function setProdOrder(\Production\ProductionBundle\Entity\ProdOrders $prodOrder = null)
    {
        $this->prodOrder = $prodOrder;

        return $this;
    }

    /**
     * Get prodOrder
     *
     * @return \Production\ProductionBundle\Entity\ProdOrders 
     */
    public function getProdOrder()
    {
        return $this->prodOrder;
    }

    /**
     * Set backUser
     *
     * @param \Production\ProductionBundle\Entity\BackUsersOld $backUser
     * @return ProdCalendarOrders
     */
    public function setBackUser(\Production\ProductionBundle\Entity\BackUsersOld $backUser = null)
    {
        $this->backUser = $backUser;

        return $this;
    }

    /**
     * Get backUser
     *
     * @return \Production\ProductionBundle\Entity\BackUsersOld 
     */
    public function getBackUser()
    {
        return $this->backUser;
    }

    /**
     * 
     * @return type
     */
    public function __toString() {
        return $this->name;
    }

}
