<?php

class User
{
    
    protected static $count = 0;
    
    public function __construct()
    {
        self::$count++;
    }
    
    public function __destruct()
    {
        self::$count--;
    }
    
    public static function getCount()
    {
        return self::$count;
    }
    
}