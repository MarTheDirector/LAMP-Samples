<?php

namespace Besmer;

class Movie {
    
    protected $title = "";
    protected $rating = "";
    protected $level = "Regular";
    protected $src = "";

    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
        
    public function getRating()
    {
        return $this->rating;
    }
    
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    
    
    public function getLevel()
    {
        return $this->level;
    }
    
        
    public function setLevel($level)
    {
        //checks for the level being regular or premium or none
        $this->level = $level;
    }
    
    
    
        
    public function getSrc()
    {
        return $this->src;
    }
    
    public function setSrc($src)
    {
        $this->src = $src;
    }
    
}