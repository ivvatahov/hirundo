<?php

/*** error reporting on ***/
error_reporting(E_ALL);

/*** define the site path ***/
$site_path = realpath(dirname(__FILE__));

define('__SITE_PATH', $site_path);

/*** define the application path ***/
define('__APP_PATH', $site_path . '/application');

include 'application/bootstrap.php';

$registry->router->loader();

?>