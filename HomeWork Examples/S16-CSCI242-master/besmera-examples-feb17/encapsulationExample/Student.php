<?php

class Student {
    
    private $name;
    private $wid;
    private $idCard;
    
    public function __construct()
    {
        $this->setWid(rand(3000000,4000000));
        $this->idCard = new IdCard();
        
    }
    
    public function getIdCard()
    {
        return $this->idCard;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getWid()
    {
        return $this->wid;
    }

    private function setWid($wid)
    {
        $this->wid = $wid;
    }
    
}