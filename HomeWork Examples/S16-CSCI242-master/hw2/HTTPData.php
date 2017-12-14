<?php
//Abstract base class goes here
abstract class HTTPData {
    
    public function __construct() //Abstract class constructor 
    {
        
    }
    
    abstract public function getKey($key);
    
}