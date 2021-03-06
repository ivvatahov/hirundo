<?php

class myMessagesController extends baseController
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

		// Getting the latest messages
		$messages = $user->getMessages();

		// Setting a values for the template

		$this->registry->template->username = $username;
		$this->registry->template->messages = $messages;
		$this->registry->template->show('home');
  	}
}
?>