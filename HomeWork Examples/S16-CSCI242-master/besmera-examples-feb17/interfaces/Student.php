<?php

require("iNameable.php");
require("iPrintable.php");

class Student implements iNameable, iPrintable {
    
    protected $name = "";
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    
    public function getName()
    {
        return $this->name;
    }
    
    public function __toString()
    {
        return $this->name;
    }
    
}