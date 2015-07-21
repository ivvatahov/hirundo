<?php
class UserRepository {

	private $dm;

	function __construct($dm) 
	{
    	$this->dm = $dm;
	}

	public function getUserByUsername($username)
	{
		return $this->dm->getRepository('User')->findOneBy(array('username' => $username));	
	}

	public function addFollower($username, $follower)
	{
		return $this->dm->createQueryBuilder('User')
    			->field('username')
    			->equals($username)
    			->update()
    			->field('followers')
    			->push($follower)
    			->getQuery()
    			->execute();
	}

	public function getFollowers($user, $skip, $limit)
	{
		return $this->dm->createQueryBuilder('User')
				-> field('followers')
				-> includesReferenceTo($user)
				-> limit($limit)
				-> skip($skip)
				-> getQuery()
				-> execute();
	}

	public function getFollowerNumber($username)
	{
		return $this->dm->createQueryBuilder('User')
		 		-> select('followers')
         		-> count()
         		->getQuery()
         		-> execute();
	}
}
?>