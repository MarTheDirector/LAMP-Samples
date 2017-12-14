<?php

namespace Besmer;

require_once("Movie.php");
require_once("User.php");
require_once("NoSubscriptionException.php");
require_once("RatingException.php");
require_once("SubscriptionLevelException.php");

use Besmer\NoSubscriptionException;
use Besmer\RatingException;
use Besmer\SubscriptionLevelException;

use Besmer\Movie;
use Besmer\User;
use \Exception;




class MoviePlayer {
    
    
    public static function playMovie(Movie $movie, User $user)
    {
        if($user->getLevel() == "None")
        {
            //error
            throw new NoSubscriptionException();
        }
        if($user->getLevel() != $movie->getLevel() )
        {
            //error
            if( $user->getLevel() == "Premium")
            {
                
            }
            else
            {
                throw new SubscriptionLevelException();
            }
        }
        if(($movie->getRating() == "PG13" && $user->getAge() < 13) || ($movie->getRating() == "R" && $user->getAge() < 17))
        {
            //error
            throw new RatingException();
        }
        
        return $movie->getSrc();
        
        
    }
    
    
}