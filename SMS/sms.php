<?php

namespace drose379\SMS;

class sms {
    
protected $userInfo; 
protected $gateways = ["Verizon" => "vtext.com","Sprint" => "messaging.sprintpcs.com","AT&T" => "txt.att.net","Metro PCS" => "mymetropcs.com"]; 
    
public function __construct($data) {
    $this->userInfo = $data;
    \drose379\Base\baseClass::keysFilled($this->userInfo);
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