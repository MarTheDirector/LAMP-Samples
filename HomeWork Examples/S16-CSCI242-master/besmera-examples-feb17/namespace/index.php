<?php

require("Besmer/Button.php");
require("Zend/Button.php");

use Besmer\Button;
//use Zend\Button as ZendButton;



$besmerButton = new Button();

echo $besmerButton->sayHello();

echo "<br>";


/*
$zendButton = new ZendButton();
echo $zendButton->sayHello();
*/

$zendButton = new \Zend\Button();
echo $zendButton->sayHello();


