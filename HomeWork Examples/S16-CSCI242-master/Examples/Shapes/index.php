<?php

require("Shape.php");
require("Rectangle.php");
require("Circle.php");
require("Square.php");

//$square1 = new Square();
//$square1 = setWidth(5);

echo "<br>";

$circle1 = new Circle();
$circle1->setRadius(5);

echo "<br>";

$rectangle = new Rectangle;
$rectangle->setWidth(7);
$rectangle->setLength(10);

$shapes = array($rectangle, $circle1);

$totalArea = 0; 

foreach($shapes as $shape)
{
    $totalArea += $shape->getArea();
}

echo "Total area = $totalArea";