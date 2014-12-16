<?php

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
        echo $e->getMessage(); 
    }
}
}