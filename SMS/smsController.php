<?php

namespace drose379\SMS;

class smsController {
    
protected $userInfo;
    
public function __construct() {
    $this->userInfo = $_POST;
}
    
public function run() {
    try {
        $SMS = new sms($this->userInfo); #Pass sms object the array of data, it will validate and throw if error on construct
        $gateway = $SMS->match(); # Match the selected carrier with the gateway
        $address = $SMS->build($gateway); # Use the gateway to build an address to mail to
        $SMS->send($address); # Send the message
        echo "Sent";
    } catch (\Exception $e) {
        $display = new displayForm; #Re direct back to the SMS form with error message if validator throws
        $display->viewSMS(['error' => $e->getMessage()]); # Pass the method the exceptions error message.
    }
}
    

    


}