<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdPricesDetail
 */
class ProdPricesDetail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $price;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\BackGroupsColors
     */
    private $backGroupsColor;

    /**
     * @var \Production\ProductionBundle\Entity\BackModels
     */
    private $backModel;

    /**
     * @var \Production\ProductionBundle\Entity\BackSizes
     */
    private $backSize;

    /**
     * @var \Production\ProductionBundle\Entity\ProdPrices
     */
    private $prodPrice;

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
     * Set price
     *
     * @param float $price
     * @return ProdPricesDetail
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ProdPricesDetail
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
     * @return ProdPricesDetail
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
     * Set backGroupsColor
     *
     * @param \Production\ProductionBundle\Entity\BackGroupsColors $backGroupsColor
     * @return ProdPricesDetail
     */
    public function setBackGroupsColor(\Production\ProductionBundle\Entity\BackGroupsColors $backGroupsColor = null)
    {
        $this->backGroupsColor = $backGroupsColor;

        return $this;
    }

    /**
     * Get backGroupsColor
     *
     * @return \Production\ProductionBundle\Entity\BackGroupsColors 
     */
    public function getBackGroupsColor()
    {
        return $this->backGroupsColor;
    }

    /**
     * Set backModel
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModel
     * @return ProdPricesDetail
     */
    public function setBackModel(\Production\ProductionBundle\Entity\BackModels $backModel = null)
    {
        $this->backModel = $backModel;

        return $this;
    }

    /**
     * Get backModel
     *
     * @return \Production\ProductionBundle\Entity\BackModels 
     */
    public function getBackModel()
    {
        return $this->backModel;
    }

    /**
     * Set backSize
     *
     * @param \Production\ProductionBundle\Entity\BackSizes $backSize
     * @return ProdPricesDetail
     */
    public function setBackSize(\Production\ProductionBundle\Entity\BackSizes $backSize = null)
    {
        $this->backSize = $backSize;

        return $this;
    }

    /**
     * Get backSize
     *
     * @return \Production\ProductionBundle\Entity\BackSizes 
     */
    public function getBackSize()
    {
        return $this->backSize;
    }

    /**
     * Set prodPrice
     *
     * @param \Production\ProductionBundle\Entity\ProdPrices $prodPrice
     * @return ProdPricesDetail
     */
    public function setProdPrice(\Production\ProductionBundle\Entity\ProdPrices $prodPrice = null)
    {
        $this->prodPrice = $prodPrice;

        return $this;
    }

    /**
     * Get prodPrice
     *
     * @return \Production\ProductionBundle\Entity\ProdPrices 
     */
    public function getProdPrice()
    {
        return $this->prodPrice;
    }

    /**
     * Set backUser
     *
     * @param \Production\ProductionBundle\Entity\BackUsersOld $backUser
     * @return ProdPricesDetail
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
    
    public function __toString()
    {
        return $this->price;
    }
    /**
     * @var integer
     */
    private $prodPricesDetailId;


    /**
     * Get prodPricesDetailId
     *
     * @return integer 
     */
    public function getProdPricesDetailId()
    {
        return $this->prodPricesDetailId;
    }
}
