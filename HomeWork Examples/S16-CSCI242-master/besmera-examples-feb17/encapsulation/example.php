<?php

require("Car.php");

$car1 = new Car();
$car2 = new Car();

$car1->setColor("red");
$car2->setColor("blue");


echo $car1->getColor();

echo $car2->getColor();
