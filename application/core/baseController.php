<?php

abstract Class baseController
{
	
  /*
  * @registry object
  */
  protected $registry;
  /*
  * @authentication object
  */
  protected $authentication;

  function __construct($registry, $authentication) 
  {
    $this->registry = $registry;
    $this->authentication = $authentication;
  }

  /**
  * @all controllers must contain an index method
  */
  abstract function index();
}

?>