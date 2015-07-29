<?php

class messageController extends baseController
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

		if (isset($_POST['message'])) {
            // Sanitize and validate the data passed in
            $content = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
           
           	// Create the new message object
			$message = new Message();
	        $message->setPublisher($user);
	        $message->setContent($content);
	        $message->setPublicationDate(new DateTime());
         
            if ($this->registry->authenticationRepository->insertMessage($message))
            {   
                redirect("home"); 
            }
            else
            {
                redirect("error");
            }
	    }

	    $this->registry->template->show('message');
  	}
}
?>