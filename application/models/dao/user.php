<?php
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
Class User {

	/** @ODM\Id */
	private $id;

	/** @ODM\String */
    private $username;

    /** @ODM\String */
    private $email;

    /** @ODM\String */
    private $password;

    /** @ODM\String */
    private $salt;

    /** @ODM\Collection */
    private $roles = array();

    /** @ODM\Date */
    private $registrationDate;

    /** @ODM\ReferenceMany(targetDocument="User") */
    private $followers;

    /** @ODM\Boolean */
    private $verified

    public function setId($id) {
    	$this->id = $id;
    }

    public function getId() {
    	return $this->id;
    }

    public function setUsername($username) {
    	$this->username = $username;
    }

    public function getUsername() {
    	return $this->username;
    }

    public function setEmail($email) {
    	$this->email = $email;
    }

    public function getEmail() {
    	return $this->email;
    }

    public function setPassword($password) {
    	$this->password = $password;
    }

    public function getPassword() {
    	return $this->password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function addRole($role) { 
    	$this->roles[] = $role; 
    }

   	public function getRoles() { 
		return $this->roles; 
	}

    public function setRegistrationDate($registrationDate) {
        $this->registrationDate = $registrationDate;
    }

    public function getRegistrationDate() {
        return $this->registrationDate;
    }

    public function setFollowers($followers) {
        $this->followers = $followers;
    }

    public function getFollowers() {
        return $this->followers;
    }


    public function setVerified($verified) {
        $this->verified = $verified;
    }

    public function isVerified() {
        return $this->verified;
    }
}

?>