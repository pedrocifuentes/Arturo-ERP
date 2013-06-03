<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackColors
 */
class BackColors {

    /**
     * @var integer
     */
    private $id;

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
    private $image;

    /**
     * @var string
     */
    private $rgb;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var boolean
     */
    private $sort;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $model;

    /**
     * Constructor
     */
    public function __construct() {
        $this->createdAt = $this->updatedAt = new \DateTime("now");
        $this->model = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return BackColors
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
     * Set code
     *
     * @param string $code
     * @return BackColors
     */
    public function setCode($code) {
        $this->code = $code;

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
     * Set image
     *
     * @param string $image
     * @return BackColors
     */
    public function setImage($image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Set rgb
     *
     * @param string $rgb
     * @return BackColors
     */
    public function setRgb($rgb) {
        $this->rgb = $rgb;

        return $this;
    }

    /**
     * Get rgb
     *
     * @return string 
     */
    public function getRgb() {
        return $this->rgb;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return BackColors
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
     * @param boolean $sort
     * @return BackColors
     */
    public function setSort($sort) {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return boolean 
     */
    public function getSort() {
        return $this->sort;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BackColors
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
     * @return BackColors
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
     * Set backGroupsColor
     *
     * @param \Production\ProductionBundle\Entity\BackGroupsColors $backGroupsColor
     * @return BackColors
     */
    public function setBackGroupsColor(\Production\ProductionBundle\Entity\BackGroupsColors $backGroupsColor = null) {
        $this->backGroupsColor = $backGroupsColor;

        return $this;
    }

    /**
     * Get backGroupsColor
     *
     * @return \Production\ProductionBundle\Entity\BackGroupsColors 
     */
    public function getBackGroupsColor() {
        return $this->backGroupsColor;
    }

    /**
     * Add model
     *
     * @param \Production\ProductionBundle\Entity\BackModels $model
     * @return BackColors
     */
    public function addModel(\Production\ProductionBundle\Entity\BackModels $model) {
        $this->model[] = $model;

        return $this;
    }

    /**
     * Remove model
     *
     * @param \Production\ProductionBundle\Entity\BackModels $model
     */
    public function removeModel(\Production\ProductionBundle\Entity\BackModels $model) {
        $this->model->removeElement($model);
    }

    /**
     * Get model
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * 
     * @return type
     */
    public function __toString() {
        return $this->name;
    }

}
