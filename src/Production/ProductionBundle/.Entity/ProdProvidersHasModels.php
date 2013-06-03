<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdProvidersHasModels
 */
class ProdProvidersHasModels
{
    /**
     * @var integer
     */
    private $prodProvidersHasModelsId;

    /**
     * @var \Production\ProductionBundle\Entity\BackModels
     */
    private $backModel;

    /**
     * @var \Production\ProductionBundle\Entity\ProdProviders
     */
    private $prodProvider;


    /**
     * Get prodProvidersHasModelsId
     *
     * @return integer 
     */
    public function getProdProvidersHasModelsId()
    {
        return $this->prodProvidersHasModelsId;
    }

    /**
     * Set backModel
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModel
     * @return ProdProvidersHasModels
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
     * Set prodProvider
     *
     * @param \Production\ProductionBundle\Entity\ProdProviders $prodProvider
     * @return ProdProvidersHasModels
     */
    public function setProdProvider(\Production\ProductionBundle\Entity\ProdProviders $prodProvider = null)
    {
        $this->prodProvider = $prodProvider;

        return $this;
    }

    /**
     * Get prodProvider
     *
     * @return \Production\ProductionBundle\Entity\ProdProviders 
     */
    public function getProdProvider()
    {
        return $this->prodProvider;
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
     * Get ModelInfo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModelsData() {
        $ma_code = array();
        if ($this->backModel) {
            foreach ($this->backModel as $k => $model) {
                $ma_code[$k]['id'] = $model->getId();
                $ma_code[$k]['code'] = $model->getCode();
            }
        }
        return $ma_code;
    }
}
