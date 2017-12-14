<?php

require("Shape.php");
require("Rectangle.php");
require("Square.php");
require("Circle.php");

/*
$rec1 = new Rectangle();

$rec1->setLength(5);
$rec1->setWidth(5);

echo "Shape 1 area is " . $rec1->getArea();

*/

$sq1 = new Square();
$sq1->setWidth(5);

$cir1 = new Circle();
$cir1->setRadius(5);

$sq2 = new Square();
$sq2->setWidth(2);

$shapes = array($sq1, $cir1, $sq2);


$totalArea = 0;
foreach($shapes as $shape)
{
    $totalArea += $shape->getArea();
}

echo "The total area is $totalArea";
