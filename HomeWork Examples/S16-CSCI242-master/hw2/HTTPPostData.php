<?php
require_once("HTTPData.php");
//Subclass HTTPPostData goes here
class HTTPPostData extends HTTPData 
{
    public function __construct() //Create constructor for HTTPPostData
    {
        
    }
    
    //Implementing of getKey from HTTPData abstract class
    public function getKey($key) //Returns $_POST with the value from key
    {                           
        return $_POST[$key];
    }
}