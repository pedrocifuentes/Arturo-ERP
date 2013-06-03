<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseProposal
 */
class PurchaseProposal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $docNo;

    /**
     * @var string
     */
    private $docNavisionId;

    /**
     * @var integer
     */
    private $docPieces;

    /**
     * @var \DateTime
     */
    private $docDate;

    /**
     * @var integer
     */
    private $docStatus;

    /**
     * @var boolean
     */
    private $docDelete;

    /**
     * @var \DateTime
     */
    private $acceptedDate;

    /**
     * @var \DateTime
     */
    private $paymentDate;

    /**
     * @var float
     */
    private $paymentExchange;

    /**
     * @var \DateTime
     */
    private $updatedAt;

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
     * Set docNo
     *
     * @param string $docNo
     * @return PurchaseProposal
     */
    public function setDocNo($docNo)
    {
        $this->docNo = $docNo;

        return $this;
    }

    /**
     * Get docNo
     *
     * @return string 
     */
    public function getDocNo()
    {
        return $this->docNo;
    }

    /**
     * Set docNavisionId
     *
     * @param string $docNavisionId
     * @return PurchaseProposal
     */
    public function setDocNavisionId($docNavisionId)
    {
        $this->docNavisionId = $docNavisionId;

        return $this;
    }

    /**
     * Get docNavisionId
     *
     * @return string 
     */
    public function getDocNavisionId()
    {
        return $this->docNavisionId;
    }

    /**
     * Set docPieces
     *
     * @param integer $docPieces
     * @return PurchaseProposal
     */
    public function setDocPieces($docPieces)
    {
        $this->docPieces = $docPieces;

        return $this;
    }

    /**
     * Get docPieces
     *
     * @return integer 
     */
    public function getDocPieces()
    {
        return $this->docPieces;
    }

    /**
     * Set docDate
     *
     * @param \DateTime $docDate
     * @return PurchaseProposal
     */
    public function setDocDate($docDate)
    {
        $this->docDate = $docDate;

        return $this;
    }

    /**
     * Get docDate
     *
     * @return \DateTime 
     */
    public function getDocDate()
    {
        return $this->docDate;
    }

    /**
     * Set docStatus
     *
     * @param integer $docStatus
     * @return PurchaseProposal
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
     * Set docDelete
     *
     * @param boolean $docDelete
     * @return PurchaseProposal
     */
    public function setDocDelete($docDelete)
    {
        $this->docDelete = $docDelete;

        return $this;
    }

    /**
     * Get docDelete
     *
     * @return boolean 
     */
    public function getDocDelete()
    {
        return $this->docDelete;
    }

    /**
     * Set acceptedDate
     *
     * @param \DateTime $acceptedDate
     * @return PurchaseProposal
     */
    public function setAcceptedDate($acceptedDate)
    {
        $this->acceptedDate = $acceptedDate;

        return $this;
    }

    /**
     * Get acceptedDate
     *
     * @return \DateTime 
     */
    public function getAcceptedDate()
    {
        return $this->acceptedDate;
    }

    /**
     * Set paymentDate
     *
     * @param \DateTime $paymentDate
     * @return PurchaseProposal
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Get paymentDate
     *
     * @return \DateTime 
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set paymentExchange
     *
     * @param float $paymentExchange
     * @return PurchaseProposal
     */
    public function setPaymentExchange($paymentExchange)
    {
        $this->paymentExchange = $paymentExchange;

        return $this;
    }

    /**
     * Get paymentExchange
     *
     * @return float 
     */
    public function getPaymentExchange()
    {
        return $this->paymentExchange;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return PurchaseProposal
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
     * Set backUsersOld
     *
     * @param \Production\ProductionBundle\Entity\BackUsersOld $backUsersOld
     * @return PurchaseProposal
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
    
    public function __toString()
    {
        return $this->docNo;
    }
}
