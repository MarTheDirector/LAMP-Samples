<?php

class Category
{
    private $name = "";
    
    //constructor
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;    
    }
}