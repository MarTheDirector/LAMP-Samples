<?php

class Shape {
    
    private $color = "";
    
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
    
}