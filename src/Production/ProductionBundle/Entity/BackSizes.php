<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackSizes
 */
class BackSizes {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var boolean
     */
    private $sort;

    /**
     * @var string
     */
    private $name;

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
     * Set active
     *
     * @param boolean $active
     * @return BackSizes
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
     * @return BackSizes
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
     * Set name
     *
     * @param string $name
     * @return BackSizes
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
     * Add model
     *
     * @param \Production\ProductionBundle\Entity\BackModels $model
     * @return BackSizes
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
