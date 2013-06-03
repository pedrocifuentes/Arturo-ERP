<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseProposalLog
 */
class PurchaseProposalLog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $docStatus;

    /**
     * @var integer
     */
    private $docAction;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Production\ProductionBundle\Entity\PurchaseProposal
     */
    private $purchaseProposal;

    /**
     * @var \Production\ProductionBundle\Entity\BackUsersOld
     */
    private $backUsersOld;


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
     * Set docStatus
     *
     * @param integer $docStatus
     * @return PurchaseProposalLog
     */
    public function setDocStatus($docStatus)
    {
        $this->docStatus = $docStatus;

        return $this;
    }

    /**
     * Get docStatus
     *
     * @return integer 
     */
    public function getDocStatus()
    {
        return $this->docStatus;
    }

    /**
     * Set docAction
     *
     * @param integer $docAction
     * @return PurchaseProposalLog
     */
    public function setDocAction($docAction)
    {
        $this->docAction = $docAction;

        return $this;
    }

    /**
     * Get docAction
     *
     * @return integer 
     */
    public function getDocAction()
    {
        return $this->docAction;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return PurchaseProposalLog
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

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
     * Set purchaseProposal
     *
     * @param \Production\ProductionBundle\Entity\PurchaseProposal $purchaseProposal
     * @return PurchaseProposalLog
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
     * Set backUsersOld
     *
     * @param \Production\ProductionBundle\Entity\BackUsersOld $backUsersOld
     * @return PurchaseProposalLog
     */
    public function setBackUsersOld(\Production\ProductionBundle\Entity\BackUsersOld $backUsersOld = null)
    {
        $this->backUsersOld = $backUsersOld;

        return $this;
    }

    /**
     * Get backUsersOld
     *
     * @return \Production\ProductionBundle\Entity\BackUsersOld 
     */
    public function getBackUsersOld()
    {
        return $this->backUsersOld;
    }
}
