<?php

class homeController extends baseController
{

  	public function index()
  	{
  		$this->authentication->sec_session_start(); 
    	if($this->authentication->login_check() == false) 
		{ 
			redirect("login");
		}

		$username = htmlentities($_SESSION['username']);
		$user = $this->registry->userRepository->getUserByUsername($username);

		$this->registry->template->username = $username;
		$this->registry->template->fileUrl = $_SERVER['PHP_SELF'] . "?rt=upload";
		$this->registry->template->submissions = $user->getDesk()->getDocuments();
		$this->registry->template->show('home');
  	}
}
?>