<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdOrdersDetail
 */
class ProdOrdersDetail
{
    /**
     * @var integer
     */
    private $items;

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
     * @var \Production\ProductionBundle\Entity\ProdOrders
     */
    private $prodOrder;


    /**
     * Set items
     *
     * @param integer $items
     * @return ProdOrdersDetail
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
     * Set backColor
     *
     * @param \Production\ProductionBundle\Entity\BackColors $backColor
     * @return ProdOrdersDetail
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
     * @return ProdOrdersDetail
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
     * @return ProdOrdersDetail
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
     * Set prodOrder
     *
     * @param \Production\ProductionBundle\Entity\ProdOrders $prodOrder
     * @return ProdOrdersDetail
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
     * @var integer
     */
    private $prod_order_id;

    /**
     * @var integer
     */
    private $back_model_id;

    /**
     * @var integer
     */
    private $back_color_id;

    /**
     * @var integer
     */
    private $back_size_id;


    /**
     * Set prod_order_id
     *
     * @param integer $prodOrderId
     * @return ProdOrdersDetail
     */
    public function setProdOrderId($prodOrderId)
    {
        $this->prod_order_id = $prodOrderId;

        return $this;
    }

    /**
     * Get prod_order_id
     *
     * @return integer 
     */
    public function getProdOrderId()
    {
        return $this->prod_order_id;
    }

    /**
     * Set back_model_id
     *
     * @param integer $backModelId
     * @return ProdOrdersDetail
     */
    public function setBackModelId($backModelId)
    {
        $this->back_model_id = $backModelId;

        return $this;
    }

    /**
     * Get back_model_id
     *
     * @return integer 
     */
    public function getBackModelId()
    {
        return $this->back_model_id;
    }

    /**
     * Set back_color_id
     *
     * @param integer $backColorId
     * @return ProdOrdersDetail
     */
    public function setBackColorId($backColorId)
    {
        $this->back_color_id = $backColorId;

        return $this;
    }

    /**
     * Get back_color_id
     *
     * @return integer 
     */
    public function getBackColorId()
    {
        return $this->back_color_id;
    }

    /**
     * Set back_size_id
     *
     * @param integer $backSizeId
     * @return ProdOrdersDetail
     */
    public function setBackSizeId($backSizeId)
    {
        $this->back_size_id = $backSizeId;

        return $this;
    }

    /**
     * Get back_size_id
     *
     * @return integer 
     */
    public function getBackSizeId()
    {
        return $this->back_size_id;
    }
}
