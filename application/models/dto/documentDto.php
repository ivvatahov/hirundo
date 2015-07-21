<?php

Class DocumentDto {

	private $id;
	private $location;
    public $date;
    public $comment;

    function __construct($document) 
    {
        $this->id = $document->getId();
        $this->location = $document->getLocation();
        $this->date = $document->getDate();
        $this->comment = $document->getComment();
    }

	public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

   	public function setLocation($location){
    	$this->location = $location;
    }

    public function getLocation(){
    	return $this->location;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setComment($comment){
        $this->comment = $comment;
    }

    public function getComment(){
        return $this->comment;
    }
}

?>