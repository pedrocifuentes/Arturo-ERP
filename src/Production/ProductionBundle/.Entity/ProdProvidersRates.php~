<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdProvidersRates
 */
class ProdProvidersRates
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
    private $active;

    /**
     * @var boolean
     */
    private $docDelete;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\ProdProviders
     */
    private $prodProviders;

    /**
     * @var \Production\ProductionBundle\Entity\BackUsersOld
     */
    private $backUsersOld;


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
     * @return ProdProvidersRates
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
     * @return ProdProvidersRates
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
     * @return ProdProvidersRates
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
     * Set active
     *
     * @param boolean $active
     * @return ProdProvidersRates
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
     * Set docDelete
     *
     * @param boolean $docDelete
     * @return ProdProvidersRates
     */
    public function setDocDelete($docDelete)
    {
        $this->docDelete = $docDelete;

        return $this;
    }

    /**
     * Get docDelete
     *
     * @return boolean 
     */
    public function getDocDelete()
    {
        return $this->docDelete;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return ProdProvidersRates
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
     * Set prodProviders
     *
     * @param \Production\ProductionBundle\Entity\ProdProviders $prodProviders
     * @return ProdProvidersRates
     */
    public function setProdProviders(\Production\ProductionBundle\Entity\ProdProviders $prodProviders = null)
    {
        $this->prodProviders = $prodProviders;

        return $this;
    }

    /**
     * Get prodProviders
     *
     * @return \Production\ProductionBundle\Entity\ProdProviders 
     */
    public function getProdProviders()
    {
        return $this->prodProviders;        
    }

    /**
     * Set backUsersOld
     *
     * @param \Production\ProductionBundle\Entity\BackUsersOld $backUsersOld
     * @return ProdProvidersRates
     */
    public function setBackUsersOld(\Production\ProductionBundle\Entity\BackUsersOld $backUsersOld = null)
    {
        $this->backUsersOld = $backUsersOld;

        return $this;
    }

    /**
     * Get backUsersOld
     *
     * @return \Production\ProductionBundle\Entity\BackUsersOld 
     */
    public function getBackUsersOld()
    {
        return $this->backUsersOld;
    }
    
    public function __toString() {
        return $this->cottonPrice;
    }
    
}
