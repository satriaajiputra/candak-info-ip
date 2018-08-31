<?php
namespace CandakInfoIP\Helpers;

class ObjectArrayTools
{
    public static function arrayToObject($array)
    {
        return is_array($array) ? (object) array_map([__CLASS__, __METHOD__], $array) : $array;
    }

    public static function objectToArray($object)
    {
        return json_decode(json_encode($object),true);
    }
}