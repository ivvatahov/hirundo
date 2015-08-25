<?php

Class MessageDto {

	public $id;
    public $publisher;
    public $content;
    public $location;
    public $publicationDate;
    //private $followers;
    public $roles = array();

    function __construct($message) 
    {
        $this->id = $message->getId();
        $this->publisher = $message->getPublisher()->getUsername();
        $this->content = $message->getContent();
        //$this->roles = $user->getRoles();
        $this->publicationDate = $message->getPublicationdate();
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }
}

?>