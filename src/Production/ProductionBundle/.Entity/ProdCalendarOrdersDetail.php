<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdCalendarOrdersDetail
 */
class ProdCalendarOrdersDetail
{
    /**
     * @var integer
     */
    private $items;

    /**
     * @var \Production\ProductionBundle\Entity\ProdCalendarOrders
     */
    private $prodCalendarOrder;

    /**
     * @var \Production\ProductionBundle\Entity\BackColors
     */
    private $backColor;

    /**
     * @var \Production\ProductionBundle\Entity\BackModels
     */
    private $backModel;

    /**
     * @var \Production\ProductionBundle\Entity\BackSizes
     */
    private $backSize;


    /**
     * Set items
     *
     * @param integer $items
     * @return ProdCalendarOrdersDetail
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get items
     *
     * @return integer 
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set prodCalendarOrder
     *
     * @param \Production\ProductionBundle\Entity\ProdCalendarOrders $prodCalendarOrder
     * @return ProdCalendarOrdersDetail
     */
    public function setProdCalendarOrder(\Production\ProductionBundle\Entity\ProdCalendarOrders $prodCalendarOrder = null)
    {
        $this->prodCalendarOrder = $prodCalendarOrder;

        return $this;
    }

    /**
     * Get prodCalendarOrder
     *
     * @return \Production\ProductionBundle\Entity\ProdCalendarOrders 
     */
    public function getProdCalendarOrder()
    {
        return $this->prodCalendarOrder;
    }

    /**
     * Set backColor
     *
     * @param \Production\ProductionBundle\Entity\BackColors $backColor
     * @return ProdCalendarOrdersDetail
     */
    public function setBackColor(\Production\ProductionBundle\Entity\BackColors $backColor = null)
    {
        $this->backColor = $backColor;

        return $this;
    }

    /**
     * Get backColor
     *
     * @return \Production\ProductionBundle\Entity\BackColors 
     */
    public function getBackColor()
    {
        return $this->backColor;
    }

    /**
     * Set backModel
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModel
     * @return ProdCalendarOrdersDetail
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
     * @return ProdCalendarOrdersDetail
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
     * @var integer
     */
    private $id;


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
     * @var integer
     */
    private $prodCalendarOrdersDetailId;


    /**
     * Get prodCalendarOrdersDetailId
     *
     * @return integer 
     */
    public function getProdCalendarOrdersDetailId()
    {
        return $this->prodCalendarOrdersDetailId;
    }
}
