<?php

namespace drose379\Login;

class login {

protected $userInfo;    
    
public function __construct($userInfo) {
    $this->userInfo = $userInfo;
    \drose379\Base\baseClass::keysFilled($this->userInfo);
}

public function checkEmail($connection) {
    $enteredEmail = $this->userInfo["email"];
    $stmt = $connection->prepare("SELECT email FROM users WHERE email = :enteredEmail");
    $stmt->bindParam(':enteredEmail',$enteredEmail);
    $stmt->execute();
    $result = $stmt->fetch();
    if (!$result) {
        throw new \Exception("Email not found.");
    }
}

public function checkPassword($connection) {
    $stmt = $connection->prepare("SELECT password FROM users WHERE email = :enteredEmail");
    $stmt->bindParam(':enteredEmail',$this->userInfo["email"]);
    $stmt->execute();
    $result = $stmt->fetch();
    
    if (!password_verify($this->userInfo["password"],$result["password"])) {
        throw new \Exception("Incorrect pass");  
    }
}
        
}

    
