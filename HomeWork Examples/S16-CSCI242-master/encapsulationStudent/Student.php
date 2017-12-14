<?php

class Student 
{
    private $name;
    private $wid;
    
    public function __construct()
    {
        $this->setWid = rand(300000,400000);
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this ->name = $name;
    }
    
    private function setWid($wid)
    {
        $this->wid = $wid;
    }
    
    public function getWid()
    {
        return $this->wid;
    }
}