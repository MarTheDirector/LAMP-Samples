<?php

require("User.php");

$alice = new User();
$bob = new User();

$alice->bestFriend = $bob;
$bob->bestFriend = $alice;

if($alice == $bob)
{
    echo "Alice == bob!";
    
}
else
{
    echo "Alice != bob!";
}


if($alice === $bob)
{
    echo "Alice === bob!";
    
}
else
{
    echo "Alice !== bob!";
}