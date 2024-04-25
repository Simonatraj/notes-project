<?php
namespace Core;
 class Validator {
    public static function string($value, $min=7, $max=INF){
       $value=trim($value);
       return strlen($value)<=$max && strlen($value)>=$min;
    }

    public static function email($value){
        return filter_var($value,FILTER_VALIDATE_EMAIL);
    }
 }