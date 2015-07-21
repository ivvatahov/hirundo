<?php

class loginController extends baseController
{

  public function index()
  {
    
    $this->authentication->sec_session_start();
    if($this->authentication->login_check()) 
    { 
        redirect("home");
    }

    $this->registry->template->registerUrl = $_SERVER['PHP_SELF'] . "?rt=register";
    $this->registry->template->loginUrl = $_SERVER['PHP_SELF'] . "?rt=login";
    
    if (isset($_POST['username'], $_POST['p'])) {
        $username = $_POST['username'];
        $password = $_POST['p']; // The hashed password.
     
        if ($this->authentication->login($username, $password) == true) {
            // Login success 

            redirect("home");
        } else {
            // Login failed
            $this->registry->template->error_msg = "The user doesn't exists"; 
            $this->registry->template->show('login');
        }
    } else {
        // The correct POST variables were not sent to this page.
        $this->registry->template->error_msg = "";
        $this->registry->template->show('login');
    }
  }
}
?>