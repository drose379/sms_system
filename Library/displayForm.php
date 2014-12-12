<?php

namespace drose379\Library;
use drose379\View\viewEngine;

class displayForm {
    
public function addMessage($message) {
    $this->Messages = $messages;   
}

public function viewSMS(array $info = []) {
    $viewEngine = new viewEngine('View/sendTemplate.php');
    $viewEngine->attach('info',$info);
    echo $viewEngine->view();
}
    
public function viewRegister() {
    $viewEngine = new viewEngine('View/registerForm.php');
    echo $viewEngine->view();
}
    
}