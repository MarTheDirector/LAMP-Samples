<?php
require_once("HTTPData.php");
//Subclass HTTPGetData goes here
class HTTPGetData extends HTTPData 
{                                    
    public function __construct()  //Create contructor for HTTPGetData
    {
        
    }
    
    //Implementing of getKey from HTTPData abstract class                                
    public function getKey($key)    //Returns $_GET with the value from key
    {
        return $_GET[$key];
    }
}