<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 */
class Products {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $catalogo;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\BackColors
     */
    private $backColors;

    /**
     * @var \Production\ProductionBundle\Entity\BackModels
     */
    private $backModels;

    /**
     * @var \Production\ProductionBundle\Entity\BackSizes
     */
    private $backSizes;

    /**
     * Constructor
     */
    public function __construct() {
        $this->updatedAt = new \DateTime("now");
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Products
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Products
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set catalogo
     *
     * @param boolean $catalogo
     * @return Products
     */
    public function setCatalogo($catalogo) {
        $this->catalogo = $catalogo;

        return $this;
    }

    /**
     * Get catalogo
     *
     * @return boolean 
     */
    public function getCatalogo() {
        return $this->catalogo;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Products
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set backColors
     *
     * @param \Production\ProductionBundle\Entity\BackColors $backColors
     * @return Products
     */
    public function setBackColors(\Production\ProductionBundle\Entity\BackColors $backColors = null) {
        $this->backColors = $backColors;

        return $this;
    }

    /**
     * Get backColors
     *
     * @return \Production\ProductionBundle\Entity\BackColors 
     */
    public function getBackColors() {
        return $this->backColors;
    }

    /**
     * Set backModels
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModels
     * @return Products
     */
    public function setBackModels(\Production\ProductionBundle\Entity\BackModels $backModels = null) {
        $this->backModels = $backModels;

        return $this;
    }

    /**
     * Get backModels
     *
     * @return \Production\ProductionBundle\Entity\BackModels 
     */
    public function getBackModels() {
        return $this->backModels;
    }

    /**
     * Set backSizes
     *
     * @param \Production\ProductionBundle\Entity\BackSizes $backSizes
     * @return Products
     */
    public function setBackSizes(\Production\ProductionBundle\Entity\BackSizes $backSizes = null) {
        $this->backSizes = $backSizes;

        return $this;
    }

    /**
     * Get backSizes
     *
     * @return \Production\ProductionBundle\Entity\BackSizes 
     */
    public function getBackSizes() {
        return $this->backSizes;
    }

    /**
     * Get backSizes details
     *
     * @return \Production\ProductionBundle\Entity\BackSizes 
     */
    public function getBackSizesData() {
        $size_arr = array();
        if ($this->backSizes) {
            foreach ($this->backSizes as $k => $size) {
                $size_arr[$k]['id'] = $size->getId();
                $size_arr[$k]['name'] = $size->getName();
            }
        }
        return $size_arr;
    }

    /**
     * 
     * @return type
     */
    public function __toString() {
        return $this->name;
    }

}
