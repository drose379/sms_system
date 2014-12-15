<?php

namespace drose379\Login;

class login {

protected $userInfo;    
    
public function __construct($userInfo) {
    $this->userInfo = $userInfo;
    \drose379\Base\baseClass::keysFilled($this->userInfo);
}

public function getEnteredEmail() {
    $email = $this->userInfo["email"];
    return $email;
}

public function getEnteredPassword() {
    $password = $this->userInfo["password"];
    return $password;
}

public function checkEmail($connection) {
    $enteredEmail = $this->getEnteredEmail();
    $stmt = $connection->prepare("SELECT email FROM users WHERE email = :enteredEmail");
    $stmt->bindParam(':enteredEmail',$enteredEmail);
    $stmt->execute();
    $result = $stmt->fetch();
    if (!$result) {
        throw new \Exception("Email not found.");
    }
}

public function checkPassword($connection) {
    $enteredPassword = $this->getEnteredPassword();
    $stmt = $connection->prepare("SELECT password FROM users WHERE email = :enteredEmail");
    $stmt->bindParam(':enteredEmail',$this->getEnteredEmail());
    $stmt->execute();
    $result = $stmt->fetch();
    
    if (!password_verify($this->getEnteredPassword(),$result["password"])) {
        throw new \Exception("Incorrect pass");  
    }
}
        
}

    
