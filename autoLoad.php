<?php

spl_autoload_register(function ($class) {
    $basePath = "{$_SERVER["DOCUMENT_ROOT"]}/oop_prac/sms_system";
    $vendorName = "drose379";
    
    # \\ is actually finding just \. the first \ escapes the second one.
    
    $path = str_replace("\\","/",$class);
    
    $path = str_replace($vendorName,$basePath,$path);
    
    $path = $path.".php";
    
    # = is assignment. In assignment, the right side is evaluated first, then assigned.
    
    if (is_readable($path)) {
        require_once($path);   
    }
    else {
        echo $class; echo "<br>";
        echo $path;
    }
});