<?php

require("Student.php");
require("IdCard.php");

$andrew = new Student();

$andrew->setName("Andrew Besmer");
//$andrew->setWid(123123123);


echo "Student Name: " . $andrew->getName();
echo "<br>";
echo "Student ID: " . $andrew->getWid();
echo "<br>";
echo "Picture: " . $andrew->getIdCard()->getPhoto();
