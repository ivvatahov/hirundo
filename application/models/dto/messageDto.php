<?php

Class MessageDto {

	public $id;
    public $publisher;
    public $content;
    public $location;
    public $publicationDate;

    function __construct($message) 
    {
        $this->id = $message->getId();
        $this->publisher = $message->getPublisher()->getUsername();
        $this->content = $message->getContent();
        $this->publicationDate = $message->getPublicationDate()->format('Y-m-d H:i:s');
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function getPublicationdate() {
        return $this->publicationDate;
    }
}

?>