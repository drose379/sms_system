<?php

namespace drose379;

class router {
    
protected $routes = array();
  
public function __construct() {
  #LoadRoutes method will add pattern/action to the routes array.
  $this->LoadRoutes();
}
  
public function loadRoutes() {
 $this->routes = ["/" => [new Library\displayForm,"viewSMS"], "/new/msg" => [new Library\smsController,"run"]];
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