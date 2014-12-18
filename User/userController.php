<?php

namespace drose379\User;

class userController {
    
protected $user;
protected $PDOconnection;

public function __construct($connection) {
    $this->PDOconnection = $connection;
}
    
public function setSessions() {
    #session_start();
    #$_SESSION["user"] = $this->user;
}
    
public function run($params) {
    $this->user = $params["user"];
    $this->setSessions();
    $userObj = new userBase($this->user);
    $name = $userObj->getName($this->PDOconnection);
    $display = new \drose379\Core\displayForm;
    $display->viewUserHome($name);
}

    

    
}