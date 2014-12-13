<?php

require 'Core/autoload.php';

define ('BASEPATH','/oop_prac/sms_system/index.php');

use drose379\Core\router;

$route = $_SERVER["PATH_INFO"] . "/";

$router = new router;
$router->run($route);