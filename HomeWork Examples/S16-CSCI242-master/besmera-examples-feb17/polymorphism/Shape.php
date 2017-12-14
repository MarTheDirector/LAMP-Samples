<?php

abstract class Shape {
    
    protected $color = "";
    
    public function __construct()
    {
        echo "Shapes constructor";
    }
    
    public function getColor()
    {
        return $this->color;
    }
    
    public function setColor($color)
    {
        $this->color = $color;
    }
    
    public abstract function getArea();
    
}