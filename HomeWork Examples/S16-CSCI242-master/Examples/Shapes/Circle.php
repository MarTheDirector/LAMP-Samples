<?php

class Circle extends Shape {
    protected $radius = 0;
    
    public function __construct()
    {
        
    }
    
    public function getRadius()
    {
        return $this->radius;
    }
    
    public function setRadius()
    {
        $this->radius = $radius;
    }
    
    public function getArea()
    {
        return 3.14*$this->radius;
    }
}