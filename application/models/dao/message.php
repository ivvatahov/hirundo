<?php

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
Class Message {
	
	/** @ODM\Id */
	private $id;

    /** @ODM\ReferenceOne(targetDocument="User", inversedBy="messages") */
    private $publisher;

    /** @ODM\String */
    private $content;

    /** @ODM\String */
    private $location;

    /** @ODM\Date */
    private $publicationDate;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }

    public function getPublisher() {
        return $this->publisher;
    }

	public function setContent($content){
    	$this->content = $content;
    }

    public function getContent(){
    	return $this->content;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setPublicationDate($publicationDate) {
        $this->publicationDate = $publicationDate;
    }

    public function getPublicationDate() {
        return $this->publicationDate;
    }
}

?>