<?php

namespace drose379\Core;

class router {
    
protected $routes = array();
  
public function __construct() {
  #LoadRoutes method will add pattern/action to the routes array.
  $this->LoadRoutes();
}
    
public function DBconnect() {
    $connection = new \PDO ('mysql:host=localhost;dbname=smsSystem','root','root');
    return $connection;
}
  
public function loadRoutes() {
$this->routes = [
    "/" => [new displayForm,"viewRegister"], 
    "/send/msg" => [new \drose379\SMS\smsController,"run"],
    "/new/msg" => [new displayForm,"viewSMS"],
    "/new/user" => [new displayForm,"viewRegister"], 
    "/register/user" => [new \drose379\Register\registerController($this->DBconnect()),"run"],              
    "/loginscreen" => [new displayform(),"viewLogin"], 
    "/login/" => [new \drose379\Login\loginController($this->DBconnect()),"run"],
    #Subpattern regex: [] === character class. ^ (inside a char class) === not. + === 1 or more.
    "/user/(?<email>[^/]+)" => [/*new user controller*/],
];
}
  
public function match($path) {
  foreach ($this->routes as $route => $action) {
    if (preg_match("#^$route/?$#i",$path,$params)) {
      return [$action,$params];
    }
  }
}
  
public function run($path) {
  list($action,$params) = $this->match($path);
  $action($params);
}
    
}