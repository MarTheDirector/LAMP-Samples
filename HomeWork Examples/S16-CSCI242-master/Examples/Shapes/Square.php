<?php

class Square extends Shape {
    public function __construct()
    {
        
    }
    
    public function setLength($length)
    {
        $this->setSide($length);
    }
    
    public function setWidth($width)
    {
        $this->setSide($width);
    }
    
    public function setSide($side)
    {
        $this->width = $side;
        $this->length = $side;
    }
    
    public function getArea()
    {
        return $this->side * $this->side;
    }
}