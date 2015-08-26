<?php

class previewsMessagesController extends baseController
{
  	public function index()
  	{
  		$this->authentication->sec_session_start(); 
    	if(!$this->authentication->login_check()) 
		{ 
			redirect("login");
		}

		$limit = 10;
		if (isset($_GET['date'])) {

			// Getting the current user
			$username = htmlentities($_SESSION['username']);
			$user = $this->registry->userRepository->getUserByUsername($username);

			$date = DateTime::createFromFormat($this->registry->dataTimeFormat, $_GET['date']);

			// Getting the previews messages
			$messages = array();

			foreach ($this->registry->userRepository->getMessagesBefore($user, $date, $limit) as $message) {
				$messages[] = new MessageDto($message);
			}
			echo json_encode(json_decode(json_encode($messages), true));
		}
  	}
}
?>