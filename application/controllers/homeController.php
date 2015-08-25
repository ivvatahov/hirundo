<?php

class homeController extends baseController
{

  	public function index()
  	{
  		$this->authentication->sec_session_start(); 
    	if(!$this->authentication->login_check()) 
		{ 
			redirect("login");
		}

		// Getting the current user
		$username = htmlentities($_SESSION['username']);
		$user = $this->registry->userRepository->getUserByUsername($username);

		// How many items to list per page
    	$limit = 8;

		// Getting the latest messages
		$messages = iterator_to_array($this->registry->userRepository->getLatestMessages($user, $limit));

		// Setting a values for the template

		$this->registry->template->username = $username;
		$this->registry->template->messages = $messages;
		$this->registry->template->show('home');
  	}
}
?>