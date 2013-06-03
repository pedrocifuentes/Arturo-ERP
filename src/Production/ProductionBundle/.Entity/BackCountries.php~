<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackCountries
 */
class BackCountries
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $address;

    /**
     * @var boolean
     */
    private $zoom;

    /**
     * @var string
     */
    private $catalog;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Production\ProductionBundle\Entity\BackLanguages
     */
    private $backLanguage;


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
     * Set code
     *
     * @param string $code
     * @return BackCountries
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return BackCountries
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return BackCountries
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return BackCountries
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zoom
     *
     * @param boolean $zoom
     * @return BackCountries
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;

        return $this;
    }

    /**
     * Get zoom
     *
     * @return boolean 
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * Set catalog
     *
     * @param string $catalog
     * @return BackCountries
     */
    public function setCatalog($catalog)
    {
        $this->catalog = $catalog;

        return $this;
    }

    /**
     * Get catalog
     *
     * @return string 
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return BackCountries
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return BackCountries
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set backLanguage
     *
     * @param \Production\ProductionBundle\Entity\BackLanguages $backLanguage
     * @return BackCountries
     */
    public function setBackLanguage(\Production\ProductionBundle\Entity\BackLanguages $backLanguage = null)
    {
        $this->backLanguage = $backLanguage;

        return $this;
    }

    /**
     * Get backLanguage
     *
     * @return \Production\ProductionBundle\Entity\BackLanguages 
     */
    public function getBackLanguage()
    {
        return $this->backLanguage;
    }
    
    public function __toString()
    {
        return $this->code;
    }
}
