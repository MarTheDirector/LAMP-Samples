<?php

class Square extends Rectangle {
 
    public function __construct()
    {
        echo "Square constructor";
    }
    
    public function setLength($length)
    {
        $this->setSide($length);
    }
    
    public function setWidth($width)
    {
        $this->setSide($width);
    }
    
    private function setSide($side)
    {
        $this->width = $side;
        $this->length = $side;
    }
    
}