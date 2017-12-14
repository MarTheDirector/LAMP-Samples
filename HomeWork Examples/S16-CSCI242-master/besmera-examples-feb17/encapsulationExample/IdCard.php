<?php

class IdCard {
    
    private $photo;
    
    public function __construct()
    {
        $this->photo = "0_o";
    }
    
    public function getPhoto()
    {
        return $this->photo;
    }
    
}