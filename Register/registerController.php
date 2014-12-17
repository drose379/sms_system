<?php

#USE FILTER_VAR TO VALIDATE EMAIL
#Call methods from the register action class.

namespace drose379\Register;
use drose379\Register\register;

class registerController {

protected $userInfo = [];
protected $PDOconnection;
    
public function __construct($connection) {
    $this->userInfo = $_POST;
    $this->PDOconnection = $connection;
}
 
public function run() {
    try {
        $register = new register($this->userInfo);
        $register->insert($this->PDOconnection);
        #echo "Inserted"; #TESTING ONLY
        header('Location:'.headerPath.'/loginscreen');
    }
    catch (\Exception $e) {
        $display = new \drose379\Core\displayForm; #Re direct back to the SMS form with error message if validator throws
        $display->viewRegister(['error' => $e->getMessage()]); # Pass the method the exceptions error message.
    }
}
}