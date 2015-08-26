<?php

class usersController extends baseController
{

  	public function index()
  	{
  		$this->authentication->sec_session_start(); 
    	if(!$this->authentication->login_check()) 
		{ 
			redirect("login");
		}

		$username = htmlentities($_SESSION['username']);
		
		// How many items to list per page
    	$limit = 20;

	    // Calculate the offset for the query
        $offset = 0;

    	$users = array();
    	foreach ($this->registry->userRepository->getUsers($username, $offset, $limit) as $user) {
    		$users[] = new UserDto($user);
    	}

		$this->registry->template->username = $username;
		$this->registry->template->users = $users;

		$this->registry->template->show('users');
  	}
}
?>