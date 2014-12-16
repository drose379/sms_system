<?php

require 'Core/autoload.php';

define ('BASEPATH','/oop_prac/sms_system/index.php');
define('headerPath','http://localhost:8888'.BASEPATH);

use drose379\Core\router;

$route = $_SERVER["PATH_INFO"] . "/";

$router = new router;
$router->run($route);