<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosUserGroup
 */
class FosUserGroup
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
     * @var array
     */
    private $roles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return FosUserGroup
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
     * Set roles
     *
     * @param array $roles
     * @return FosUserGroup
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Add user
     *
     * @param \Production\ProductionBundle\Entity\FosUserUser $user
     * @return FosUserGroup
     */
    public function addUser(\Production\ProductionBundle\Entity\FosUserUser $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Production\ProductionBundle\Entity\FosUserUser $user
     */
    public function removeUser(\Production\ProductionBundle\Entity\FosUserUser $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}
