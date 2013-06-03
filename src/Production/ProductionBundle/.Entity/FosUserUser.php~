<?php

namespace Production\ProductionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosUserUser
 */
class FosUserUser
{
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
    private $usernameCanonical;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $emailCanonical;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $lastLogin;

    /**
     * @var boolean
     */
    private $locked;

    /**
     * @var boolean
     */
    private $expired;

    /**
     * @var \DateTime
     */
    private $expiresAt;

    /**
     * @var string
     */
    private $confirmationToken;

    /**
     * @var \DateTime
     */
    private $passwordRequestedAt;

    /**
     * @var array
     */
    private $roles;

    /**
     * @var boolean
     */
    private $credentialsExpired;

    /**
     * @var \DateTime
     */
    private $credentialsExpireAt;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $dateOfBirth;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $website;

    /**
     * @var string
     */
    private $biography;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $facebookUid;

    /**
     * @var string
     */
    private $facebookName;

    /**
     * @var json
     */
    private $facebookData;

    /**
     * @var string
     */
    private $twitterUid;

    /**
     * @var string
     */
    private $twitterName;

    /**
     * @var json
     */
    private $twitterData;

    /**
     * @var string
     */
    private $gplusUid;

    /**
     * @var string
     */
    private $gplusName;

    /**
     * @var json
     */
    private $gplusData;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $twoStepCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $group;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return FosUserUser
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     * @return FosUserUser
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string 
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return FosUserUser
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
     * Set emailCanonical
     *
     * @param string $emailCanonical
     * @return FosUserUser
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string 
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return FosUserUser
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return FosUserUser
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return FosUserUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return FosUserUser
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return FosUserUser
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set expired
     *
     * @param boolean $expired
     * @return FosUserUser
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get expired
     *
     * @return boolean 
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     * @return FosUserUser
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     * @return FosUserUser
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set passwordRequestedAt
     *
     * @param \DateTime $passwordRequestedAt
     * @return FosUserUser
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    /**
     * Get passwordRequestedAt
     *
     * @return \DateTime 
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Set roles
     *
     * @param array $roles
     * @return FosUserUser
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
     * Set credentialsExpired
     *
     * @param boolean $credentialsExpired
     * @return FosUserUser
     */
    public function setCredentialsExpired($credentialsExpired)
    {
        $this->credentialsExpired = $credentialsExpired;

        return $this;
    }

    /**
     * Get credentialsExpired
     *
     * @return boolean 
     */
    public function getCredentialsExpired()
    {
        return $this->credentialsExpired;
    }

    /**
     * Set credentialsExpireAt
     *
     * @param \DateTime $credentialsExpireAt
     * @return FosUserUser
     */
    public function setCredentialsExpireAt($credentialsExpireAt)
    {
        $this->credentialsExpireAt = $credentialsExpireAt;

        return $this;
    }

    /**
     * Get credentialsExpireAt
     *
     * @return \DateTime 
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return FosUserUser
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

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return FosUserUser
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
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return FosUserUser
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return FosUserUser
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return FosUserUser
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return FosUserUser
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return FosUserUser
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return FosUserUser
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return FosUserUser
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return FosUserUser
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return FosUserUser
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set facebookUid
     *
     * @param string $facebookUid
     * @return FosUserUser
     */
    public function setFacebookUid($facebookUid)
    {
        $this->facebookUid = $facebookUid;

        return $this;
    }

    /**
     * Get facebookUid
     *
     * @return string 
     */
    public function getFacebookUid()
    {
        return $this->facebookUid;
    }

    /**
     * Set facebookName
     *
     * @param string $facebookName
     * @return FosUserUser
     */
    public function setFacebookName($facebookName)
    {
        $this->facebookName = $facebookName;

        return $this;
    }

    /**
     * Get facebookName
     *
     * @return string 
     */
    public function getFacebookName()
    {
        return $this->facebookName;
    }

    /**
     * Set facebookData
     *
     * @param json $facebookData
     * @return FosUserUser
     */
    public function setFacebookData($facebookData)
    {
        $this->facebookData = $facebookData;

        return $this;
    }

    /**
     * Get facebookData
     *
     * @return json 
     */
    public function getFacebookData()
    {
        return $this->facebookData;
    }

    /**
     * Set twitterUid
     *
     * @param string $twitterUid
     * @return FosUserUser
     */
    public function setTwitterUid($twitterUid)
    {
        $this->twitterUid = $twitterUid;

        return $this;
    }

    /**
     * Get twitterUid
     *
     * @return string 
     */
    public function getTwitterUid()
    {
        return $this->twitterUid;
    }

    /**
     * Set twitterName
     *
     * @param string $twitterName
     * @return FosUserUser
     */
    public function setTwitterName($twitterName)
    {
        $this->twitterName = $twitterName;

        return $this;
    }

    /**
     * Get twitterName
     *
     * @return string 
     */
    public function getTwitterName()
    {
        return $this->twitterName;
    }

    /**
     * Set twitterData
     *
     * @param json $twitterData
     * @return FosUserUser
     */
    public function setTwitterData($twitterData)
    {
        $this->twitterData = $twitterData;

        return $this;
    }

    /**
     * Get twitterData
     *
     * @return json 
     */
    public function getTwitterData()
    {
        return $this->twitterData;
    }

    /**
     * Set gplusUid
     *
     * @param string $gplusUid
     * @return FosUserUser
     */
    public function setGplusUid($gplusUid)
    {
        $this->gplusUid = $gplusUid;

        return $this;
    }

    /**
     * Get gplusUid
     *
     * @return string 
     */
    public function getGplusUid()
    {
        return $this->gplusUid;
    }

    /**
     * Set gplusName
     *
     * @param string $gplusName
     * @return FosUserUser
     */
    public function setGplusName($gplusName)
    {
        $this->gplusName = $gplusName;

        return $this;
    }

    /**
     * Get gplusName
     *
     * @return string 
     */
    public function getGplusName()
    {
        return $this->gplusName;
    }

    /**
     * Set gplusData
     *
     * @param json $gplusData
     * @return FosUserUser
     */
    public function setGplusData($gplusData)
    {
        $this->gplusData = $gplusData;

        return $this;
    }

    /**
     * Get gplusData
     *
     * @return json 
     */
    public function getGplusData()
    {
        return $this->gplusData;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return FosUserUser
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set twoStepCode
     *
     * @param string $twoStepCode
     * @return FosUserUser
     */
    public function setTwoStepCode($twoStepCode)
    {
        $this->twoStepCode = $twoStepCode;

        return $this;
    }

    /**
     * Get twoStepCode
     *
     * @return string 
     */
    public function getTwoStepCode()
    {
        return $this->twoStepCode;
    }

    /**
     * Add group
     *
     * @param \Production\ProductionBundle\Entity\FosUserGroup $group
     * @return FosUserUser
     */
    public function addGroup(\Production\ProductionBundle\Entity\FosUserGroup $group)
    {
        $this->group[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \Production\ProductionBundle\Entity\FosUserGroup $group
     */
    public function removeGroup(\Production\ProductionBundle\Entity\FosUserGroup $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }
    
    public function __toString()
    {
        return $this->username;
    }
}
