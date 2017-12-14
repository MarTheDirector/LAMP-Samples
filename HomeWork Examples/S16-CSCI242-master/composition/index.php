<?php

require("Product.php");
require("Category.php");

$product1 = new Product();
$category1 = new Category();

$product1->setName("Samsung Edge");
$category1 ->setName("Cell Phone");

$product1->setCategory($category1);

echo "Product Name:" . 