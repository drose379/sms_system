<?php

namespace drose379\Base;

class baseClass {
    
#VALIDATION 
public static function getKeys($array) {
    $arrayKeys = array_keys($array);
    return $arrayKeys;
}
    
public static function keysfilled($array) {
    $keys = self::getKeys($array);
    foreach ($keys as $key) {
        if (empty($array[$key])) {
            throw new \Exception ("Fill in all fields.");
        } 
    }
}
    
#DATABASE     
public static function getConnection() {
  return new \PDO ('mysql:host=localhost;dbname=smsSystem','root','root');
}
    
}