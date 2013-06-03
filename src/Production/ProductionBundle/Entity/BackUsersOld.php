<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackUsersOld
 */
class BackUsersOld {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $nickname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var boolean
     */
    private $docStatus;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Production\ProductionBundle\Entity\BackBusinessUnits
     */
    private $backBusinessUnit;

    /**
     * @var \Production\ProductionBundle\Entity\BackProfiles
     */
    private $backProfiles;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return BackUsersOld
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return BackUsersOld
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return BackUsersOld
     */
    public function setNickname($nickname) {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname() {
        return $this->nickname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return BackUsersOld
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return BackUsersOld
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
     * Set docStatus
     *
     * @param boolean $docStatus
     * @return BackUsersOld
     */
    public function setDocStatus($docStatus) {
        $this->docStatus = $docStatus;

        return $this;
    }

    /**
     * Get docStatus
     *
     * @return boolean 
     */
    public function getDocStatus() {
        return $this->docStatus;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BackUsersOld
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return BackUsersOld
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set backBusinessUnit
     *
     * @param \Production\ProductionBundle\Entity\BackBusinessUnits $backBusinessUnit
     * @return BackUsersOld
     */
    public function setBackBusinessUnit(\Production\ProductionBundle\Entity\BackBusinessUnits $backBusinessUnit = null) {
        $this->backBusinessUnit = $backBusinessUnit;

        return $this;
    }

    /**
     * Get backBusinessUnit
     *
     * @return \Production\ProductionBundle\Entity\BackBusinessUnits 
     */
    public function getBackBusinessUnit() {
        return $this->backBusinessUnit;
    }

    /**
     * Set backProfiles
     *
     * @param \Production\ProductionBundle\Entity\BackProfiles $backProfiles
     * @return BackUsersOld
     */
    public function setBackProfiles(\Production\ProductionBundle\Entity\BackProfiles $backProfiles = null) {
        $this->backProfiles = $backProfiles;

        return $this;
    }

    /**
     * Get backProfiles
     *
     * @return \Production\ProductionBundle\Entity\BackProfiles 
     */
    public function getBackProfiles() {
        return $this->backProfiles;
    }

    /**
     * 
     * @return type
     */
    public function __toString() {
        return $this->username;
    }

}
