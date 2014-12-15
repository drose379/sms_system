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
    
public function viewRegister() {
    $viewEngine = new viewEngine('Register/registerForm.php');
    echo $viewEngine->view();
}
    
public function viewLogin() {
    $viewEngine = new viewEngine('Login/loginForm.php');
    echo $viewEngine->view();
}
    
}