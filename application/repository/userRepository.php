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

	public function persist($object)
	{
		$this->dm->persist($object);
		$this->dm->flush();
	}

	public function isFollowedExists($user, $followed) {
		$count = $this->dm->createQueryBuilder('User')
		 		-> field('followers')
		 		-> includesReferenceTo($user)
		 		-> field("username")
		 		-> equals($followed->getUsername())
         		-> count()
         		-> getQuery()
         		-> execute();

        return $count != 0;
	} 

	public function getUserNumber($username)
	{
		$number = $this->dm->createQueryBuilder('User')
				-> field("username")
				-> notEqual($username)
         		-> count()
         		-> getQuery()
         		-> execute();

        return $number;
	}

	public function getUsers($username, $skip, $limit)
	{
		$users = $this->dm->createQueryBuilder('User')
				-> field("username")
				-> notEqual($username)
				-> limit($limit)
				-> skip($skip)
				-> getQuery()
				-> execute();

		return $users;
	}

	public function follow($user, $followed) 
	{
		$query = $this->dm->createQueryBuilder('User')
    			-> update()
			    -> field('followers') -> addToSet($followed)
			    -> field('id')->equals($user->getId())
			    -> getQuery()
			    -> execute();

		return $query;
	}

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
		$following = iterator_to_array($user->getFollowing());

		$messages = $this->dm->createQueryBuilder('Message')
				-> field("publisher")
				-> in($following)
				//-> sort('publicationDate', 'desc')
				//-> limit($limit)
                -> getQuery()
                -> execute();

        foreach ($messages as $message) {
        
        }


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

/*	public function getMessagesAfter($date, $limit)
	{
		$messages = $this->dm->createQueryBuilder('Message')
                  -> field('publicationDate')->gte($date)
                  -> sort('publicationDate', 'desc')
                  -> limit($limit)
                  -> getQuery()
                  -> execute();

        return $messages;
	}*/
}
?>