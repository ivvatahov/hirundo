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
    private $followers = array();

    /** @ODM\ReferenceMany(targetDocument="User") */
    private $following = array();

    /** @ODM\Boolean */
    private $verified;

    /** @ODM\ReferenceMany(targetDocument="Message", mappedBy="publisher") */
    private $messages;

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

    public function getFollowing() {
        return $this->following;
    }

    public function setFollowing($following) {
        $this->following = $following;
    }

    public function addFollowing($followed) {
        $this->following[] = $followed;
        $followed->followers[] = $this;
    }

    public function getFollowers() {
        return $this->followers;
    }

    public function removeFollower($follower) {
       foreach($this->followers as $k=>$v) {
            if($v->getUsername() == $follower->getUsername()) {
                unset($this->followers[$k]);
                break;
            }
        }  
    }

    public function removeFollowing($followed) {
        $followed->removeFollower($this);

        foreach($this->following as $k=>$v) {
            if($v->getUsername() == $followed->getUsername()) {
                unset($this->following[$k]);
                break;
            }
        }          
    }

    public function setVerified($verified) {
        $this->verified = $verified;
    }

    public function isVerified() {
        return $this->verified;
    }

    public function getMessages() {
        return $this->messages;
    }

    public function addMessage($message) { 
        $this->messages[] = $message; 
    }

    public function setMessages($messages) {
        $this->messages = $messages;
    }
}

?>