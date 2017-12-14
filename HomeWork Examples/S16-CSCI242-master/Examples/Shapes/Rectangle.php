<?php

class Rectangle extends Shape {
    protected $length = 0;
    protected $width = 0;
    
    public function __construct()
    {
        
    }
    
    public function getLength()
    {
        return $this->length;
    }
    
    public function setLength()
    {
        $this->length = $length;
    }
    
    public function getWidth()
    {
        return $this->width;
    }
    
    public function setWidth()
    {
        $this->width = $width;
    }
    
    public function getArea()
    {
        return $this->width * $this->length;
    }
}