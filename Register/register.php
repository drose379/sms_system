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

namespace drose379\Register;

class register {
    
#protected $PDOconnection;
 
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
    
public function getUsername() {
    $username = $this->userInfo["username"];
    return $username;
}
    
public function getEmail() {
    $email = $this->userInfo["email"];
    return $email;
}

public function insert($connection) {
    $FirstName = $this->getFirstName();
    $LastName = $this->getLastName();
    $Username = $this->getUsername();
    $Email = $this->getEmail();
    $Hash = $this->getHash();
    
    $ValueArray = [$FirstName,$LastName,$Username,$Email,$Hash];
    
    #insert above values into DB after making connection.
    $stmt = $connection->prepare("INSERT INTO users (FirstName,LastName,Username,Email,Password) VALUES (?,?,?,?,?)");
    $stmt->execute($ValueArray);
}

    
    
}