<?php

Class DeskDto {
	
	private $id;
    private $current;
	private $documents = array();

    function __construct($desk) 
    {
        $this->id = $desk->getId();
        $this->documents = $desk->getDocuments();
        $this->current = $desk->getCurrent();

        foreach ($desk->getDocuments() as $document) {
            $this->documents[$document->getId()] = new DocumentDto($document);
        }
    }

	public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function addDocument($document) { 
    	$this->documents[] = $document; 
    }

   	public function getDocuments() { 
		return $this->documents; 
	}

    public function getCurrent() { 
        return $this->documents[$this->current];
    }
}

?>