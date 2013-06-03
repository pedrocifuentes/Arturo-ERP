<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseProposalProdProvidersRates
 */
class PurchaseProposalProdProvidersRates
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $total;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\PurchaseProposal
     */
    private $purchaseProposal;

    /**
     * @var \Production\ProductionBundle\Entity\ProdProvidersRates
     */
    private $prodProvidersRates;


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
     * Set total
     *
     * @param float $total
     * @return PurchaseProposalProdProvidersRates
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return PurchaseProposalProdProvidersRates
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

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
     * Set purchaseProposal
     *
     * @param \Production\ProductionBundle\Entity\PurchaseProposal $purchaseProposal
     * @return PurchaseProposalProdProvidersRates
     */
    public function setPurchaseProposal(\Production\ProductionBundle\Entity\PurchaseProposal $purchaseProposal = null)
    {
        $this->purchaseProposal = $purchaseProposal;

        return $this;
    }

    /**
     * Get purchaseProposal
     *
     * @return \Production\ProductionBundle\Entity\PurchaseProposal 
     */
    public function getPurchaseProposal()
    {
        return $this->purchaseProposal;
    }

    /**
     * Set prodProvidersRates
     *
     * @param \Production\ProductionBundle\Entity\ProdProvidersRates $prodProvidersRates
     * @return PurchaseProposalProdProvidersRates
     */
    public function setProdProvidersRates(\Production\ProductionBundle\Entity\ProdProvidersRates $prodProvidersRates = null)
    {
        $this->prodProvidersRates = $prodProvidersRates;

        return $this;
    }

    /**
     * Get prodProvidersRates
     *
     * @return \Production\ProductionBundle\Entity\ProdProvidersRates 
     */
    public function getProdProvidersRates()
    {
        return $this->prodProvidersRates;
    }
}
