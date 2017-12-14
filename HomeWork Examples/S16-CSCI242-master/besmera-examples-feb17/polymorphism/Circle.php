<?php

class Circle extends Shape{
    
    protected $radius = 0;
    
    //construct
    
    public function getRadius()
    {
        return $this->radius;
    }
    
    public function setRadius($radius)
    {
        $this->radius = $radius;
    }
    
    public function getArea()
    {
        return 3.14*$this->radius*$this->radius;
    }
    
}