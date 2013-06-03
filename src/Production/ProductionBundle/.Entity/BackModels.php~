<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackModels
 */
class BackModels
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
    private $prodProvider;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prodProvider = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return BackModels
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
     * @param integer $sort
     * @return BackModels
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BackModels
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

    /**
     * Set code
     *
     * @param string $code
     * @return BackModels
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set masterSize
     *
     * @param string $masterSize
     * @return BackModels
     */
    public function setMasterSize($masterSize)
    {
        $this->masterSize = $masterSize;

        return $this;
    }

    /**
     * Get masterSize
     *
     * @return string 
     */
    public function getMasterSize()
    {
        return $this->masterSize;
    }

    /**
     * Set new
     *
     * @param boolean $new
     * @return BackModels
     */
    public function setNew($new)
    {
        $this->new = $new;

        return $this;
    }

    /**
     * Get new
     *
     * @return boolean 
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set bag
     *
     * @param string $bag
     * @return BackModels
     */
    public function setBag($bag)
    {
        $this->bag = $bag;

        return $this;
    }

    /**
     * Get bag
     *
     * @return string 
     */
    public function getBag()
    {
        return $this->bag;
    }

    /**
     * Set box
     *
     * @param string $box
     * @return BackModels
     */
    public function setBox($box)
    {
        $this->box = $box;

        return $this;
    }

    /**
     * Get box
     *
     * @return string 
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * Set weightWhite
     *
     * @param string $weightWhite
     * @return BackModels
     */
    public function setWeightWhite($weightWhite)
    {
        $this->weightWhite = $weightWhite;

        return $this;
    }

    /**
     * Get weightWhite
     *
     * @return string 
     */
    public function getWeightWhite()
    {
        return $this->weightWhite;
    }

    /**
     * Set weightColor
     *
     * @param string $weightColor
     * @return BackModels
     */
    public function setWeightColor($weightColor)
    {
        $this->weightColor = $weightColor;

        return $this;
    }

    /**
     * Get weightColor
     *
     * @return string 
     */
    public function getWeightColor()
    {
        return $this->weightColor;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return BackModels
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BackModels
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
     * @return BackModels
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
     * Add prodProvider
     *
     * @param \Production\ProductionBundle\Entity\ProdProviders $prodProvider
     * @return BackModels
     */
    public function addProdProvider(\Production\ProductionBundle\Entity\ProdProviders $prodProvider)
    {
        $this->prodProvider[] = $prodProvider;

        return $this;
    }

    /**
     * Remove prodProvider
     *
     * @param \Production\ProductionBundle\Entity\ProdProviders $prodProvider
     */
    public function removeProdProvider(\Production\ProductionBundle\Entity\ProdProviders $prodProvider)
    {
        $this->prodProvider->removeElement($prodProvider);
    }

    /**
     * Get prodProvider
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProdProvider()
    {
        return $this->prodProvider;
    }
        
    public function __toString()
    {
        return $this->name;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $backColors;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $backSizes;


    /**
     * Add backColors
     *
     * @param \Production\ProductionBundle\Entity\BackColors $backColors
     * @return BackModels
     */
    public function addBackColor(\Production\ProductionBundle\Entity\BackColors $backColors)
    {
        $this->backColors[] = $backColors;

        return $this;
    }

    /**
     * Remove backColors
     *
     * @param \Production\ProductionBundle\Entity\BackColors $backColors
     */
    public function removeBackColor(\Production\ProductionBundle\Entity\BackColors $backColors)
    {
        $this->backColors->removeElement($backColors);
    }

    /**
     * Get backColors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBackColors()
    {
        return $this->backColors;
    }

    /**
     * Add backSizes
     *
     * @param \Production\ProductionBundle\Entity\BackSizes $backSizes
     * @return BackModels
     */
    public function addBackSize(\Production\ProductionBundle\Entity\BackSizes $backSizes)
    {
        $this->backSizes[] = $backSizes;

        return $this;
    }

    /**
     * Remove backSizes
     *
     * @param \Production\ProductionBundle\Entity\BackSizes $backSizes
     */
    public function removeBackSize(\Production\ProductionBundle\Entity\BackSizes $backSizes)
    {
        $this->backSizes->removeElement($backSizes);
    }

    /**
     * Get backSizes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBackSizes()
    {
        return $this->backSizes;
    }
}
