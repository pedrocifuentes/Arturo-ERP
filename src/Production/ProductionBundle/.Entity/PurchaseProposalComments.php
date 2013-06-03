<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseProposalComments
 */
class PurchaseProposalComments
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comments;

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
     * Set comments
     *
     * @param string $comments
     * @return PurchaseProposalComments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return PurchaseProposalComments
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
     * @return PurchaseProposalComments
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
     * @return PurchaseProposalComments
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
