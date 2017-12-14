<?php

require("Product.php");
require("Category.php");
/*
$product1 = new Product();
$category1 = new Category();

$product1->setName("Samsung Edge");
$category1->setName("Cell Phone");

$product1->setCategory($category1);


$category1->setName("Smart Phone");


echo "Product Name: " . $product1->getName();
echo "<br>";
echo "Category: " . $product1->getCategory()->getName();

*/


$product1 = new Product();
$product1->setName("Samsung Edge");

$product2 = clone $product1;

$product2->setName("Samsung S4");

echo "Product 1: " . $product1->getName();
echo "<br>";
echo "Product 2: " . $product2->getName();
