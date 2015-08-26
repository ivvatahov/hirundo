<?php

class unfollowController extends baseController
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

		if (isset($_POST['followed'])) {
			$followedName = htmlentities($_POST['followed']);
			$followed = $this->registry->userRepository->getUserByUsername($followedName);		

			$user->removeFollowing($followed);
			$this->registry->userRepository->persist($user);     
        }

		redirect("users");
  	}
}
?>