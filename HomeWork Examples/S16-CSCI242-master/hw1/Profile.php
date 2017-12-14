<?php

class Profile {
    protected $firstName = "";
    protected $lastName = "";
    protected $emailAddress = "";
    
    public function __construct()   //create the constructor
    {
        
    }
    
    public function getFirstName()  //get  the first name for the current object
    {
        return $this->firstName;
    }
    
    public function setFirstName($firstName) //set  the first name for the current object
    {
        $this->firstName = $firstName;
    }
    
    public function getLastName() //get  the last name for the current object
    {
        return $this->lastName;
    }
    
    public function setLastName($lastName) //set  the last name for the current object
    {
        $this->lastName = $lastName;
    }
    
    public function getEmailAddress() //get  the email address for the current object
    {
        return $this->emailAddress;
    }
    
    public function setEmailAddress($emailAddress) ////set  the email address for the current object
    {
        $this->emailAddress = $emailAddress;
    }
}