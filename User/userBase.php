<?php

namespace drose379\User;

class userBase {
    
protected $user;
    
public function __construct($user) {
    $this->user = $user;   
}

public function getName($connection) {
    $stmt = $connection->prepare("SELECT FirstName,LastName FROM users WHERE username = :username");
    $stmt->bindParam(':username',$this->user);
    $stmt->execute();
    $Result = $stmt->fetch();
    $firstname = $Result["FirstName"];
    $lastname = $Result["LastName"];
    return ["firstname" => $firstname, "lastname" =>$lastname];
}
    
}