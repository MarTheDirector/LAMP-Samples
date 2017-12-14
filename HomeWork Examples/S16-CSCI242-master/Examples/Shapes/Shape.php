<?php

abstract class Shape {
    protected $color = "";
    
    public function __construct()
    {
        
    }
    
    public function getColor()
    {
        return $this->color;
    }
    
    public function setColor()
    {
        $this-> color = $color;
    }
    
    abstract function getArea();
}