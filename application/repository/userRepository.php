<?php
class UserRepository {

	private $dm;

	function __construct($dm) 
	{
    	$this->dm = $dm;
	}

	public function getUserByUsername($username)
	{
		$user = $this->dm->getRepository('User')->findOneBy(array('username' => $username));
		return new UserDto($user);	
	}

	public function addDocument($username, $document)
	{
		return $this->dm->createQueryBuilder('User')
    			->field('username')
    			->equals($username)
    			->update()
    			->field('desk.documents')
    			->push($document)
    			->getQuery()
    			->execute();
	}

	public function setCurrent($username, $document)
	{
		$this->dm->createQueryBuilder('User')
			->field('username')
			->equals($username)
			->update()
			->field('desk.current') 
			->set($document->getId())
			->getQuery()
			->execute();
	}
}
?>