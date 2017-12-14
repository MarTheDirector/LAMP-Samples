<?php

require("Student.php");

$andrew = new Student();

$andrew->setName("Andrew Besmer");
$andrew->setWid(123123123);


echo "Student Name: " . $andrew->getName();
echo "<br>";
echo "Student ID: " . $andrew->getWid();