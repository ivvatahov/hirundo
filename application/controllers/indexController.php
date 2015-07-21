<?php

class indexController extends baseController
{

  	public function index()
  	{
  		$this->authentication->sec_session_start();
    	if(!$this->authentication->login_check()) 
		{ 
			redirect("login");
		}

		redirect("home");
  	}
}
?>