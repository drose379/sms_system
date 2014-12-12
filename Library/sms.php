<?php

namespace drose379\Library;

class sms {
    
protected $userInfo; 
protected $gateways = ["Verizon" => "vtext.com","Sprint" => "messaging.sprintpcs.com","AT&T" => "txt.att.net","Metro PCS" => "mymetropcs.com"]; 
    
public function __construct($data) {
    $this->userInfo = $data;
    $this->keysFilled();
}
    
public function getKeys() {
    $arrayKeys = array_keys($this->userInfo);
    return $arrayKeys;
}

#Must be called inside a try{} block.
public function keysFilled() {
    $keys = $this->getKeys();
    foreach ($keys as $key) {
        if (empty($this->userInfo[$key])) {
            throw new \Exception ("Fill in all fields.");
        }
    }
}
    
public function match() {
    foreach ($this->gateways as $carrier => $gateway) {
        if (preg_match("#^$carrier$#i",$this->userInfo["carrier"])) {
            return $gateway;
        }
    }
}
    
public function build($gateway) {
    $address = $this->userInfo["tel"];
    $address = $address . "@";
    $address = $address . $gateway;
    return $address;
}
    
public function send($address) {
    $message = $this->userInfo["message"];
    $message = wordwrap($message,70,"\n");
    $headers = 'From: sms-system@test.com';
    mail($address,'<SMS System>',$message,$headers);
}
    
}