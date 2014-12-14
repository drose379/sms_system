<?php

/*
*Class that holds methods that register user. 
*Example: 
*   - Get $_POST data and assign it to a protected property
*   - Make sure necessary user data is filled
*   - Create a PDO connection to a DB
*   - Insert data into DB
*   - Bring user to login 
*   - DO NOT PROGRAM UNTIL ALL METHODS ARE PLANNED OUT
*/

namespace drose379\UserSystem;

class register {
    
protected $PDOconnection;
 
protected $userInfo = [];
    
public function __construct($userData) {
    $this->userInfo = $userData;
    \drose379\Base\baseClass::keysFilled($this->userInfo);
}
    
public function getHash() {
    $hash = password_hash($this->userInfo["password"],PASSWORD_BCRYPT);
    return $hash;
}
    
public function getFirstName() {
    $Name = $this->userInfo["firstName"];
    return $Name;
}
    
public function getLastName() {
    $Name = $this->userInfo["lastName"];
    return $Name;
}
    
public function getEmail() {
    $email = $this->userInfo["email"];
    return $email;
}
    
public function setConnection() {
    $this->PDOconnection = new \PDO ('mysql:host=localhost;dbname=smsSystem','root','root');
}
    
public function getConnection() {
    if (! $this->PDOconnection instanceof PDO) {
        $this->setConnection();   
    }
    return $this->PDOconnection;
}
    
public function insert() {
    $FirstName = $this->getFirstName();
    $LastName = $this->getLastName();
    $Email = $this->getEmail();
    $Hash = $this->getHash();
    
    $ValueArray = [$FirstName,$LastName,$Email,$Hash];
    
    #insert above values into DB after making connection.
    $Connection = $this->getConnection();
    $stmt = $Connection->prepare("INSERT INTO users (FirstName,LastName,Email,Password) VALUES (?,?,?,?)");
    $stmt->execute($ValueArray);
}

    
    
}