<?php

require("User.php");

$user1 = new User();

echo "The current count is " . User::getCount() . "<br>";

$user2 = new User();

echo "The current count is " . User::getCount() . "<br>";

$user1= null;

echo "The current count is " . User::getCount() . "<br>";

$user2 = null;

echo "The current count is " . User::getCount() . "<br>";