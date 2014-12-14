<?php

#Call methods from the register action class.

namespace drose379\Register;
use drose379\Register\register;

class registerController {

protected $userInfo = [];    
    
public function __construct() {
    $this->userInfo = $_POST;
}
 
public function run() {
    try {
        $register = new register($this->userInfo);
        $register->insert();
        echo "Inserted"; #TESTING ONLY
        #!!!CALL TO A LOG IN VIEW!!!
    }
    catch (\Exception $e) {
        echo $e->getMessage(); 
    }
}
}