<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdPrices
 */
class ProdPrices
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fromDate;

    /**
     * @var \DateTime
     */
    private $toDate;

    /**
     * @var float
     */
    private $cottonPrice;

    /**
     * @var boolean
     */
    private $docStatus;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\BackUsersOld
     */
    private $backUser;

    /**
     * @var \Production\ProductionBundle\Entity\ProdProviders
     */
    private $prodProvider;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prodOrder;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prodOrder = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fromDate
     *
     * @param \DateTime $fromDate
     * @return ProdPrices
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
     * @return ProdPrices
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
     * Set cottonPrice
     *
     * @param float $cottonPrice
     * @return ProdPrices
     */
    public function setCottonPrice($cottonPrice)
    {
        $this->cottonPrice = $cottonPrice;

        return $this;
    }

    /**
     * Get cottonPrice
     *
     * @return float 
     */
    public function getCottonPrice()
    {
        return $this->cottonPrice;
    }

    /**
     * Set docStatus
     *
     * @param boolean $docStatus
     * @return ProdPrices
     */
    public function setDocStatus($docStatus)
    {
        $this->docStatus = $docStatus;

        return $this;
    }

    /**
     * Get docStatus
     *
     * @return boolean 
     */
    public function getDocStatus()
    {
        return $this->docStatus;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return ProdPrices
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ProdPrices
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime();

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
     * @return ProdPrices
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime();

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
     * Set backUser
     *
     * @param \Production\ProductionBundle\Entity\BackUsersOld $backUser
     * @return ProdPrices
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
     * Set prodProvider
     *
     * @param \Production\ProductionBundle\Entity\ProdProviders $prodProvider
     * @return ProdPrices
     */
    public function setProdProvider(\Production\ProductionBundle\Entity\ProdProviders $prodProvider = null)
    {
        $this->prodProvider = $prodProvider;

        return $this;
    }

    /**
     * Get prodProvider
     *
     * @return \Production\ProductionBundle\Entity\ProdProviders 
     */
    public function getProdProvider()
    {
        return $this->prodProvider;
    }

    /**
     * Add prodOrder
     *
     * @param \Production\ProductionBundle\Entity\ProdOrders $prodOrder
     * @return ProdPrices
     */
    public function addProdOrder(\Production\ProductionBundle\Entity\ProdOrders $prodOrder)
    {
        $this->prodOrder[] = $prodOrder;

        return $this;
    }

    /**
     * Remove prodOrder
     *
     * @param \Production\ProductionBundle\Entity\ProdOrders $prodOrder
     */
    public function removeProdOrder(\Production\ProductionBundle\Entity\ProdOrders $prodOrder)
    {
        $this->prodOrder->removeElement($prodOrder);
    }

    /**
     * Get prodOrder
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProdOrder()
    {
        return $this->prodOrder;
    }
    
    public function __toString()
    {
        return $this->fromDate;
    }
}
