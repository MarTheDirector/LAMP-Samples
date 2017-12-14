<?php

namespace Besmer;

class User
{
    
    protected $username = "";
    protected $age = 0;
    protected $level = "None";
    
    //constructor
    
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function getLevel()
    {
        return $this->level;
    }
    
    public function setUsername($username)
    {
        //checks for some valid username
        $this->username = $username;
    }
    
    public function setAge($age)
    {
        //checks for age <130 > 0
        $this->age = $age;
    }
    
    public function setLevel($level)
    {
        //checks for the level being regular or premium or none
        $this->level = $level;
    }
    
}