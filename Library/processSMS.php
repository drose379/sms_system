<?php

namespace drose379\Library;

class processSMS {

protected $userInfo = [];
protected $gateways = ["Verizon" => "vtext.com","Sprint" => "messaging.sprintpcs.com","AT&T" => "txt.att.net","Metro PCS" => "mymetropcs.com"]; 
    
public function __construct() {
    $this->userInfo = $_POST;
}
    
public function run() {
    #Call method that matches carrier to a gateway and get the return with: $gateway = $this->match();
    $gateway = $this->match();
    #Pass the $gateway to a function that builds the address to send to that RETURNS the address
    $address = $this->build($gateway);
    #Pass the address to a method that sends the package.
    $this->send($address);
    echo "Sent";
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