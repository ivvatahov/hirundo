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
		$user = $this->registry->userRepository->getUserByUsername($username);

		$total = $this->registry->userRepository->getFollowerNumber($username);

		// How many items to list per page
    	$limit = 20;

    	// How many pages will there be
    	$pages = ceil($total / $limit);

    	 // What page are we currently on?
	    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
	        'options' => array(
	            'default'   => 1,
	            'min_range' => 1,
	        ),
	    )));

	    // Calculate the offset for the query
        $offset = ($page - 1)  * $limit;

        // Some information to display to the user
    	$start = $offset + 1;
    	$end = min(($offset + $limit), $total);

    	// The "back" link
   	 	$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

   	 	// The "forward" link
    	$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    	$followers = $this->registry->userRepository->getFollowers($user, $offset, $limit);

		$this->registry->template->prevlink = $prevlink;
		$this->registry->template->nextlink = $nextlink;    	
		$this->registry->template->username = $username;
		$this->registry->template->followers = $followers;

		$this->registry->template->show('users');
  	}
}
?>