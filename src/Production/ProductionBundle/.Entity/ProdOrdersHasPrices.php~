<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdOrdersHasPrices
 */
class ProdOrdersHasPrices
{
    /**
     * @var integer
     */
    private $prodOrdersHasPricesId;

    /**
     * @var float
     */
    private $total;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\ProdPrices
     */
    private $prodPrice;

    /**
     * @var \Production\ProductionBundle\Entity\ProdOrders
     */
    private $prodOrder;


    /**
     * Get prodOrdersHasPricesId
     *
     * @return integer 
     */
    public function getProdOrdersHasPricesId()
    {
        return $this->prodOrdersHasPricesId;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return ProdOrdersHasPrices
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ProdOrdersHasPrices
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
     * @return ProdOrdersHasPrices
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
     * Set prodPrice
     *
     * @param \Production\ProductionBundle\Entity\ProdPrices $prodPrice
     * @return ProdOrdersHasPrices
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
     * Set prodOrder
     *
     * @param \Production\ProductionBundle\Entity\ProdOrders $prodOrder
     * @return ProdOrdersHasPrices
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
}
