<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackProfiles
 */
class BackProfiles
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $docStatus;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $createdAt;


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
     * Set name
     *
     * @param string $name
     * @return BackProfiles
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
     * Set docStatus
     *
     * @param boolean $docStatus
     * @return BackProfiles
     */
    public function setDocStatus($docStatus)
    {
        $this->docStatus = $docStatus;

        return $this;
    }

    /**
     * Get docStatus
     *
     * @return boolean 
     */
    public function getDocStatus()
    {
        return $this->docStatus;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return BackProfiles
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BackProfiles
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
    
    public function __toString()
    {
        return $this->name;
    }
}
