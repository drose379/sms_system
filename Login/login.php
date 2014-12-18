<?php

namespace drose379\Login;

class login {

protected $userInfo;    
    
public function __construct($userInfo) {
    $this->userInfo = $userInfo;
    \drose379\Base\baseClass::keysFilled($this->userInfo);
}

public function checkUsername($connection) {
    $username = $this->userInfo["username"];
    $stmt = $connection->prepare("SELECT username FROM users WHERE username = :username");
    $stmt->bindParam(':username',$username);
    $stmt->execute();
    $result = $stmt->fetch();
    if (!$result) {
        throw new \Exception("Username not found.");
    }
}

public function checkPassword($connection) {
    $stmt = $connection->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username',$this->userInfo["username"]);
    $stmt->execute();
    $result = $stmt->fetch();
    
    if (!password_verify($this->userInfo["password"],$result["password"])) {
        throw new \Exception("Incorrect pass");  
    }
}
        
}

    
