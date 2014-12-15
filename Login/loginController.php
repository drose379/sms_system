<?php

namespace drose379\Login;

class loginController {

protected $userInfo = [];
protected $PDOconnection;
    
public function __construct($connection) {
    $this->userInfo = $_POST;
    $this->PDOconnection = $connection;
}
    
public function run() {
    try {
        $login = new login($this->userInfo);
        $login->checkEmail($this->PDOconnection);
        #Password check only runs if email is correct
        $login->checkPassword($this->PDOconnection);
        echo "Pass!";
        #If this point is reached and no errors are thrown, call a header for the router to log person in (go to user page)
        #Have a method inside login class that calls a header with a piece of user info (Last name, email) 
        #Call it from here (controller)
    }
    catch (\Exception $e) { 
        echo $e->getMessage();   
    }
}
    
}