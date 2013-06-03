<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackModelsHasBackColors
 */
class BackModelsHasBackColors
{
    /**
     * @var integer
     */
    private $backModelsHasBackColorsId;

    /**
     * @var boolean
     */
    private $isNew;

    /**
     * @var \Production\ProductionBundle\Entity\BackColors
     */
    private $backColors;

    /**
     * @var \Production\ProductionBundle\Entity\BackModels
     */
    private $backModels;


    /**
     * Get backModelsHasBackColorsId
     *
     * @return integer 
     */
    public function getBackModelsHasBackColorsId()
    {
        return $this->backModelsHasBackColorsId;
    }

    /**
     * Set isNew
     *
     * @param boolean $isNew
     * @return BackModelsHasBackColors
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;

        return $this;
    }

    /**
     * Get isNew
     *
     * @return boolean 
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Set backColors
     *
     * @param \Production\ProductionBundle\Entity\BackColors $backColors
     * @return BackModelsHasBackColors
     */
    public function setBackColors(\Production\ProductionBundle\Entity\BackColors $backColors = null)
    {
        $this->backColors = $backColors;

        return $this;
    }

    /**
     * Get backColors
     *
     * @return \Production\ProductionBundle\Entity\BackColors 
     */
    public function getBackColors()
    {
        return $this->backColors;
    }

    /**
     * Set backModels
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModels
     * @return BackModelsHasBackColors
     */
    public function setBackModels(\Production\ProductionBundle\Entity\BackModels $backModels = null)
    {
        $this->backModels = $backModels;

        return $this;
    }

    /**
     * Get backModels
     *
     * @return \Production\ProductionBundle\Entity\BackModels 
     */
    public function getBackModels()
    {
        return $this->backModels;
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
}
