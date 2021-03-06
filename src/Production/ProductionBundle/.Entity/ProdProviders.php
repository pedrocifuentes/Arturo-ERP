<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdProviders
 */
class ProdProviders {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var string
     */
    private $cifNif;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $createAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $backModel;

    /**
     * Constructor
     */
    public function __construct() {
        $this->backModel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ProdProviders
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return ProdProviders
     */
    public function setContact($contact) {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact() {
        return $this->contact;
    }

    /**
     * Set cifNif
     *
     * @param string $cifNif
     * @return ProdProviders
     */
    public function setCifNif($cifNif) {
        $this->cifNif = $cifNif;

        return $this;
    }

    /**
     * Get cifNif
     *
     * @return string 
     */
    public function getCifNif() {
        return $this->cifNif;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return ProdProviders
     */
    public function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return ProdProviders
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ProdProviders
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
     * @return ProdProviders
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
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return ProdProviders
     */
    public function setCreateAt($createAt) {
        $this->createAt = new \DateTime();

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt() {
        return $this->createAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return ProdProviders
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = new \DateTime();

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
     * Add backModel
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModel
     * @return ProdProviders
     */
    public function addBackModel(\Production\ProductionBundle\Entity\BackModels $backModel) {
        $this->backModel[] = $backModel;

        return $this;
    }

    /**
     * Remove backModel
     *
     * @param \Production\ProductionBundle\Entity\BackModels $backModel
     */
    public function removeBackModel(\Production\ProductionBundle\Entity\BackModels $backModel) {
        $this->backModel->removeElement($backModel);
    }

    /**
     * Get backModel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBackModel() {
        return $this->backModel;
    }

    /**
     * Get backModel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBackModels() {
        $models = "";
        if ($this->backModel) {
            $ma_code = array();
            foreach ($this->backModel as $k => $model) {
                $ma_code[] = $model->getCode();
            }
            $models = implode(',', $ma_code);
        }
        return $models;
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

    public function __toString() {
        return $this->name;
    }

}
