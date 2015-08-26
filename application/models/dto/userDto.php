<?php

Class UserDto {

	private $id;
    private $username;
    private $email;
    private $followers;
    private $following;
    private $registrationDate;
    //private $messages;

    function __construct($user) 
    {
        $this->id = $user->getId();
        $this->username = $user->getUsername();
        $this->email = $user->getEmail();
        $this->registrationDate = $user->getRegistrationDate();
        
        foreach ($user->getFollowing() as $followed) {
            $this->following[$followed->getUsername()] = 0;
        }
        
        foreach ($user->getFollowers() as $follower) {
            $this->followers[$follower->getUsername()] = 0;
        }
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setUsername($username) {
    	$this->username = $username;
    }

    public function getUsername() {
    	return $this->username;
    }

    public function setEmail($email){
    	$this->email = $email;
    }

    public function getEmail(){
    	return $this->email;
    }

    public function addRole($role) { 
    	$this->roles[] = $role; 
    }

   	public function getRoles() { 
		return $this->roles; 
	}

    public function getFollowing() {
        return $this->following;
    }

    public function getFollowers() {
        return $this->followers;
    }

    public function getRegistrationDate() {
        return $this->registrationDate;
    }
}

?>