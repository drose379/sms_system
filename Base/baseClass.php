<?php

namespace drose379\Base;

class baseClass {
 
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
    
}