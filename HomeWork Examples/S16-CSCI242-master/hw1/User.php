<?php
//require("Profile.php");

class User {
    protected $username = "";
    protected $profile = null;
    
    public function __construct()   //Create contructor
    {

    }
    
    public function getUsername()   //get the username for the current object
    {
        return $this->username;
    }
    
    public function setUsername($username)  //set  the username for the current object
    {
        $this->username = $username;
    }
    
    public function getProfile()    //get the profile for the current object
    {
        return $this->Profile; //
    }
    
    public function setProfile($profile) //set  the profile for the current object
    {
        $this->Profile = $profile;
    }
}