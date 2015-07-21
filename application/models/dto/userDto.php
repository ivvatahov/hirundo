<?php

Class UserDto {

	private $id;
    private $username;
    private $email;
    //private $followers;
    private $roles = array();

    function __construct($user) 
    {
        $this->id = $user->getId();
        $this->username = $user->getUsername();
        $this->email = $user->getEmail();
        $this->roles = $user->getRoles();
        //$this->followers = $user->getFollowers();
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
}

?>