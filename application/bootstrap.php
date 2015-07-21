<?php

include "autoloadManager.php";

$autoloadManager = new autoloadManager(__SITE_PATH . '/data/cache/classes/cache.php', autoloadManager::SCAN_ONCE);
$autoloadManager->addFolder(__APP_PATH);
$autoloadManager->addFolder(__SITE_PATH . '/includes');
$autoloadManager->register();

require_once __SITE_PATH . "/vendor/autoload.php";

include 'configs/doctrine_config.php';


function redirect($location, $statusCode = 302)
{
	session_write_close();
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://$host$uri?rt=$location");
   	exit();
}

$registry = new registry();
$authenticationRepository = new AuthenticationRepository($dm);
$userRepository = new UserRepository($dm);
$authentication = new Authentication($authenticationRepository);

/*** load the reoisitories **/
$registry->userRepository = $userRepository;
$registry->authenticationRepository = $authenticationRepository;

/*** load the router **/
$registry->router = new router($registry, $authentication);

/*** set the controller path **/
$registry->router->setPath (__APP_PATH . '/controller');

/*** load up the template **/
$registry->template = new template($registry);
?>