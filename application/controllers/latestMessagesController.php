<?php

class latestMessagesController extends baseController
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

			// Getting the latest messages
			$messages = array();

			foreach ($this->registry->userRepository->getMessagesAfter($user, $date, $limit) as $message) {
				//print_r($this->objectToArray(new MessageDto($message)));
				//$messages[] = $this->objectToArray(new MessageDto($message));
				//print_r(json_decode(json_encode(new MessageDto($message)), true));
				
				$messages[] = new MessageDto($message);
			}
			//print_r(json_decode(json_encode($messages), true));
			//print_r(json_encode($messages));
			echo json_encode(json_decode(json_encode($messages), true));
		}
  	}

  	private function objectToArray ($object) {
	    if(!is_object($object) && !is_array($object))
	        return $object;

	    return array_map(array($this, __FUNCTION__), (array) $object);
	}
}
?>