<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Production\ProductionBundle\Func;

/**
 * BackModels
 */
class BackModels {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $sort;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $masterSize;

    /**
     * @var boolean
     */
    private $new;

    /**
     * @var string
     */
    private $bag;

    /**
     * @var string
     */
    private $box;

    /**
     * @var string
     */
    private $weightWhite;

    /**
     * @var string
     */
    private $weightColor;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $color;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $size;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prodProvider;

    /**
     * Constructor
     */
    public function __construct() {
        $this->createdAt = $this->updatedAt = new \DateTime("now");
        $this->color = new \Doctrine\Common\Collections\ArrayCollection();
        $this->size = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prodProvider = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return BackModels
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
     * Set sort
     *
     * @param integer $sort
     * @return BackModels
     */
    public function setSort($sort) {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer 
     */
    public function getSort() {
        return $this->sort;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BackModels
     */
    public function setName($name) {
        $this->name = $name;
        $this->setSlug($this->name . ' ' . $this->code);

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
     * Set code
     *
     * @param string $code
     * @return BackModels
     */
    public function setCode($code) {
        $this->code = $code;
        $this->setSlug($this->name . ' ' . $this->code);

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set masterSize
     *
     * @param string $masterSize
     * @return BackModels
     */
    public function setMasterSize($masterSize) {
        $this->masterSize = $masterSize;

        return $this;
    }

    /**
     * Get masterSize
     *
     * @return string 
     */
    public function getMasterSize() {
        return $this->masterSize;
    }

    /**
     * Set new
     *
     * @param boolean $new
     * @return BackModels
     */
    public function setNew($new) {
        $this->new = $new;

        return $this;
    }

    /**
     * Get new
     *
     * @return boolean 
     */
    public function getNew() {
        return $this->new;
    }

    /**
     * Set bag
     *
     * @param string $bag
     * @return BackModels
     */
    public function setBag($bag) {
        $this->bag = $bag;

        return $this;
    }

    /**
     * Get bag
     *
     * @return string 
     */
    public function getBag() {
        return $this->bag;
    }

    /**
     * Set box
     *
     * @param string $box
     * @return BackModels
     */
    public function setBox($box) {
        $this->box = $box;

        return $this;
    }

    /**
     * Get box
     *
     * @return string 
     */
    public function getBox() {
        return $this->box;
    }

    /**
     * Set weightWhite
     *
     * @param string $weightWhite
     * @return BackModels
     */
    public function setWeightWhite($weightWhite) {
        $this->weightWhite = $weightWhite;

        return $this;
    }

    /**
     * Get weightWhite
     *
     * @return string 
     */
    public function getWeightWhite() {
        return $this->weightWhite;
    }

    /**
     * Set weightColor
     *
     * @param string $weightColor
     * @return BackModels
     */
    public function setWeightColor($weightColor) {
        $this->weightColor = $weightColor;

        return $this;
    }

    /**
     * Get weightColor
     *
     * @return string 
     */
    public function getWeightColor() {
        return $this->weightColor;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return BackModels
     */
    public function setSlug($slug) {
        //$this->slug = $slug;
        $this->slug = $this->toSlug($this->name . ' ' . $this->code);

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BackModels
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return BackModels
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
     * Add color
     *
     * @param \Production\ProductionBundle\Entity\BackColors $color
     * @return BackModels
     */
    public function addColor(\Production\ProductionBundle\Entity\BackColors $color) {
        $this->color[] = $color;

        return $this;
    }

    /**
     * Remove color
     *
     * @param \Production\ProductionBundle\Entity\BackColors $color
     */
    public function removeColor(\Production\ProductionBundle\Entity\BackColors $color) {
        $this->color->removeElement($color);
    }

    /**
     * Get color
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * Add size
     *
     * @param \Production\ProductionBundle\Entity\BackSizes $size
     * @return BackModels
     */
    public function addSize(\Production\ProductionBundle\Entity\BackSizes $size) {
        $this->size[] = $size;

        return $this;
    }

    /**
     * Remove size
     *
     * @param \Production\ProductionBundle\Entity\BackSizes $size
     */
    public function removeSize(\Production\ProductionBundle\Entity\BackSizes $size) {
        $this->size->removeElement($size);
    }

    /**
     * Get size
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * Get backModel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSizeMaster() {
        $ma_size = array();
        if ($this->size) {
            foreach ($this->size as $k => $size) {
                $ma_size[$k]['id'] = $size->getId();
                $ma_size[$k]['name'] = $size->getName();
            }
        }
        return $ma_size;
    }

    /**
     * Get getColors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColorMaster() {
        $ma_color = array();
        if ($this->color) {
            foreach ($this->color as $k => $color) {
                $ma_color[$k]['id'] = $color->getId();
                $ma_color[$k]['name'] = $color->getName();
            }
        }
        return $ma_color;
    }

    /**
     * Add prodProvider
     *
     * @param \Production\ProductionBundle\Entity\ProdProviders $prodProvider
     * @return BackModels
     */
    public function addProdProvider(\Production\ProductionBundle\Entity\ProdProviders $prodProvider) {
        $this->prodProvider[] = $prodProvider;

        return $this;
    }

    /**
     * Remove prodProvider
     *
     * @param \Production\ProductionBundle\Entity\ProdProviders $prodProvider
     */
    public function removeProdProvider(\Production\ProductionBundle\Entity\ProdProviders $prodProvider) {
        $this->prodProvider->removeElement($prodProvider);
    }

    /**
     * Get prodProvider
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProdProvider() {
        return $this->prodProvider;
    }

    /**
     * 
     * @return type
     */
    public function __toString() {
        return $this->name;
    }

    /**
     * name convert to string
     * @param type $str
     * @return type
     */
    public function toSlug($str) {

        $clean = strtolower(trim($str, '-'));
        $clean = preg_replace(" /[^\p{Latin}0-9\/_|+ -]+/u", '', $clean);
        $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
        $clean = trim($clean, '-');

        return $clean;
    }

}
