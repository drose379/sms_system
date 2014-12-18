<?php

namespace drose379\Core;
use drose379\Core\viewEngine;

class displayForm {
    
public function addMessage($message) {
    $this->Messages = $messages;   
}

public function viewSMS(array $info = []) {
    $viewEngine = new viewEngine('SMS/sendTemplate.php');
    $viewEngine->attach('info',$info);
    echo $viewEngine->view();
}
    
public function viewRegister(array $info = []) {
    $viewEngine = new viewEngine('Register/registerForm.php');
    $viewEngine->attach('info',$info);
    echo $viewEngine->view();
}
    
public function viewLogin(array $info = []) {
    $viewEngine = new viewEngine('Login/loginForm.php');
    $viewEngine->attach('info',$info);
    echo $viewEngine->view();
}
    
public function viewUserHome(array $info = []) {
    $viewEngine = new viewEngine('User/userHomeTemplate.php');
    $viewEngine->attach('info',$info);
    $viewEngine->attach('test',$_SESSION["user"]);
    echo $viewEngine->view();
}

    
}