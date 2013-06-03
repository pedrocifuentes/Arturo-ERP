<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackSizes
 */
class BackSizes
{
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return BackSizes
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
     * Set sort
     *
     * @param boolean $sort
     * @return BackSizes
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return boolean 
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BackSizes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function __toString()
    {
        return $this->name;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $backModels;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->backModels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add backModels
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModels
     * @return BackSizes
     */
    public function addBackModel(\Production\ProductionBundle\Entity\BackModels $backModels)
    {
        $this->backModels[] = $backModels;

        return $this;
    }

    /**
     * Remove backModels
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModels
     */
    public function removeBackModel(\Production\ProductionBundle\Entity\BackModels $backModels)
    {
        $this->backModels->removeElement($backModels);
    }

    /**
     * Get backModels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBackModels()
    {
        return $this->backModels;
    }
}
