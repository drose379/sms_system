<?php

namespace drose379\Library;
use drose379\View\viewEngine;

class displayForm {

public function view() {
    $viewEngine = new viewEngine('View/sendTemplate.php');
    echo $viewEngine->view();
}
    
}