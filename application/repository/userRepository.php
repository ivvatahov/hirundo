<?php
class UserRepository {

	private $dm;

	function __construct($dm) 
	{
    	$this->dm = $dm;
	}

	public function getUserByUsername($username)
	{
		$user =  $this->dm->getRepository('User')->findOneBy(array('username' => $username));	
		return $user;
	}

/*	public function addFollower($username, $follower)
	{
		$is_succeeded =  $this->dm->createQueryBuilder('User')
    			->field('username')
    			->equals($username)
    			->update()
    			->field('followers')
    			->push($follower)
    			->getQuery()
    			->execute();

    	return $is_succeeded;
	}*/

	public function getAllFollowers($user) 
	{
		$followers = $this->dm->createQueryBuilder('User')
		-> field('followers')
		-> includesReferenceTo($user)
		-> getQuery()
		-> execute();

		return $followers;
	}

	public function getFollowers($user, $skip, $limit)
	{
		$followers = $this->dm->createQueryBuilder('User')
				-> field('followers')
				-> includesReferenceTo($user)
				-> limit($limit)
				-> skip($skip)
				-> getQuery()
				-> execute();

		return $followers;
	}

	public function getFollowerNumber($user)
	{
		$number = $this->dm->createQueryBuilder('User')
		 		-> field('followers')
		 		-> includesReferenceTo($user)
         		-> count()
         		-> getQuery()
         		-> execute();

        return $number;
	}

	public function addMessage($message)
	{
		$this->dm->persist($message);
		$this->dm->flush();
		return true;
	}

	public function getLatestMessages($user, $limit) 
	{
		$followers = iterator_to_array($this->getAllFollowers($user));

		$messages = $this->dm->createQueryBuilder('Message')
				-> field("publisher")
				-> in($followers)
				-> sort('publicationDate', 'desc')
				-> limit($limit)
                -> getQuery()
                -> execute();

        return $messages;
	}

	public function getUserMessages($user)
	{
		$messages = $this->dm->createQueryBuilder('Message')
		        -> field("publisher")
				-> references($user)
                -> getQuery()
                -> execute();	

        return $messages;	
	}

	public function getMessagesAfter($date, $limit)
	{
		$messages = $this->dm->createQueryBuilder('Message')
                  -> field('publicationDate')->gte($date)
                  -> sort('publicationDate', 'desc')
                  -> limit($limit)
                  -> getQuery()
                  -> execute();

        return $messages;
	}
}
?>