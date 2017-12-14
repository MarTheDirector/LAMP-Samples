<?php

require_once("Besmer/Movie.php");
require_once("Besmer/User.php");
require_once("Besmer/MoviePlayer.php");

require_once("Besmer/NoSubscriptionException.php");
require_once("Besmer/RatingException.php");
require_once("Besmer/SubscriptionLevelException.php");

use Besmer\NoSubscriptionException;
use Besmer\RatingException;
use Besmer\SubscriptionLevelException;

use Besmer\Movie;
use Besmer\User;
use Besmer\MoviePlayer;

$bob = new User();

$bob->setAge(6);
$bob->setuserName("xBob2010x");
$bob->setLevel("Regular");

$winnie = new Movie();
$winnie->setRating("G");
$winnie->setSrc('<iframe width="420" height="315" src="https://www.youtube.com/embed/e3VGpsvRQJ4" frameborder="0" allowfullscreen></iframe>');
$winnie->setTitle("Winnie the Pooh");


$an = new Movie();
$an->setRating("R");
$an->setSrc('<iframe width="560" height="315" src="https://www.youtube.com/embed/ntPHFVWDIqM" frameborder="0" allowfullscreen></iframe>');
$an->setTitle("Apocalypse Now");


try {

    //echo MoviePlayer::playMovie($winnie, $bob);
    //echo "Your movie should be playing.";
    
    echo MoviePlayer::playMovie($an, $bob);
    echo "Your movie should be playing.";

}
catch (NoSubscriptionException $ex)
{
    echo "Why don't you sign up here.";
}
catch (SubscriptionLevelException $ex)
{
    echo "You don't have access to this content, consider upgrading your subscription here.";
}
catch (RatingException $ex)
{
    echo "This movie is not rated for someone your age.";    
}
catch (Exception $ex)
{
    echo "Some error occured, we notified developers.";
}

echo "After catches.";