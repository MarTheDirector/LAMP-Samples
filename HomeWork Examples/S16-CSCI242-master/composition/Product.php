<?php

class Product
{

    private $name = "";
    private $category;
    
    
    //constructor
    
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    
    public function setName($name)
    {
        
    }
    
    public function getName()
    {
        return $this->name;
    }

}