<?php

class Rectangle extends Shape {
    
    protected $length = 0;
    protected $width = 0;
    
    public function __construct()
    {
        echo "Rectangle constructor";
    }
    
    public function getLength()
    {
        return $this->length;
    }
    
    public function setLength($length)
    {
        $this->length = $length;
    }
    
    public function getWidth()
    {
        return $this->width;
    }
    
    public function setWidth($width)
    {
        $this->width = $width;
    }
    
    public function getArea()
    {
        return $this->length * $this->width;
    }
    
}