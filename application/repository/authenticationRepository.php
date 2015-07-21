<?php
class AuthenticationRepository {

	private $dm;

	function __construct($dm) 
	{
    	$this->dm = $dm;
	}

	public function getUserByUsername($username)
	{
		$user = $this->dm->getRepository('User')->findOneBy(array('username' => $username));
		return $user;	
	}

	public function getUserByEmail($email)
	{
		$user = $this->dm->getRepository('User')->findOneBy(array('email' => $email));
		return $user;	
	}

	public function insertUser($user)
	{
		$this->dm->persist($user);
		$this->dm->flush();
		return true;
	}
}
?>