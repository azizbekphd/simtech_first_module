<?php

function read_param($array, $key, $required=true, $default=null) {
    $exists = array_key_exists($key, $array) && $array[$key];
    if ($required && !$exists) {
        throw new Exception("Field \"" . $key . "\" is required");
    }
    return $exists ? $array[$key] : $default;
}
