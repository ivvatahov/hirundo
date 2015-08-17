<?php

include "autoloadManager.php";

$autoloadManager = new autoloadManager(__SITE_PATH . '/data/cache/classes/cache.php', autoloadManager::SCAN_ONCE);
$autoloadManager->addFolder(__APP_PATH);
$autoloadManager->addFolder(__VENDOR_PATH);
$autoloadManager->register();

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
$registry->router->setPath (__APP_PATH . '/controllers');

/*** load up the template **/
$registry->template = new template($registry);

/*** load the site urls **/
$registry->template->usersUrl = $_SERVER['PHP_SELF'] . "?rt=users";
$registry->template->homeUrl = $_SERVER['PHP_SELF'] . "?rt=home";
$registry->template->logoutUrl = $_SERVER['PHP_SELF'] . "?rt=logout";
$registry->template->loginUrl = $_SERVER['PHP_SELF'] . "?rt=login";
$registry->template->registerUrl = $_SERVER['PHP_SELF'] . "?rt=register";
$registry->template->messageUrl = $_SERVER['PHP_SELF'] . "?rt=message";
$registry->template->myMessageUrl = $_SERVER['PHP_SELF'] . "?rt=myMessages";
$registry->template->followUrl = $_SERVER['PHP_SELF'] . "?rt=follow";
?>