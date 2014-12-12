<?php

namespace drose379\Library;
use drose379\View\viewEngine;

class displayForm {

public function viewSMS() {
    $viewEngine = new viewEngine('View/sendTemplate.php');
    echo $viewEngine->view();
}
    
public function viewRegister() {
    $viewEngine = new viewEngine('View/registerForm.php');
    echo $viewEngine->view();
}
    
}