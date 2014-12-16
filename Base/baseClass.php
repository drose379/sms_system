<?php

namespace drose379\Base;

class baseClass {
    
#VALIDATION 
public static function getKeys($array) {
    $arrayKeys = array_keys($array);
    return $arrayKeys;
}
    
public static function keysfilled($array) {
    if (!empty($array)) {
        $keys = self::getKeys($array);
        foreach ($keys as $key) {
            if (empty($array[$key])) {
                throw new \Exception ("Fill in all fields.");
            } 
        }
    }
    else {
        throw new \Exception ("No faulty requests");   
    }
}
    
}
