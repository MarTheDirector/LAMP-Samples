<?php

class Car {

    private $color = "silver";



    public function __construct()
    {
        
        
        //here we do some initialization
       // echo "The object is currently being constructed.";
    }
    

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        if($color == "red" || $color == "blue" || $color == "silver")
        {
            $this->color = $color;
        }
    }

    
    


}