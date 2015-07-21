<?php

class registerController extends baseController
{

    public function index()
    {
        $this->authentication->sec_session_start(); 
        if($this->authentication->login_check()) 
        { 
            redirect("home");
        }

        /*** set a template variables ***/
        $this->registry->template->registerUrl = $_SERVER['PHP_SELF'] . "?rt=register";
        $this->registry->template->loginUrl = $_SERVER['PHP_SELF'] . "?rt=login";
        $error_msg = '';

        if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
            // Sanitize and validate the data passed in
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Not a valid email
                $this->registry->template->$error_msg .= '<p class="error">The email address you entered is not valid</p>';
            }
        
            $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
            if (strlen($password) != 128) {
                // The hashed pwd should be 128 characters long.
                // If it's not, something really odd has happened
                $error_msg .= '<p class="error">Invalid password configuration.</p>';
            }
         
            // Username validity and password validity have been checked client side.
            // This should should be adequate as nobody gains any advantage from
            // breaking these rules.
            //
         
           // check existing email  
            if ($user = $this->registry->authenticationRepository->getUserByEmail($email)) {
                // A user with this email address already exists
                $error_msg .= '<p class="error">A user with this email address already exists.</p>';
            }
         
            // check existing username
            if ($user = $this->registry->authenticationRepository->getUserByUsername($username)) {
                // A user with this username address already exists
                $error_msg .= '<p class="error">A user with this username already exists</p>';
            }
         
            $this->registry->template->error_msg = $error_msg;

            if (empty($error_msg)) {

                // Create a random salt
                //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
                $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
         
                // Create salted password 
                $password = hash('sha512', $password . $random_salt);
         
                // Insert the new user into the database 
                $user = new User();
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setSalt($random_salt);
                $user->setPassword($password);
                $user->addRole('user');
                
                if ($this->registry->authenticationRepository->insertUser($user))
                {   
                    redirect("home"); 
                }
                else
                {
                    redirect("error");
                }
            }
            $this->registry->template->show('register');
        } else {
            $this->registry->template->show('register');            
        } 
    }
}
?>