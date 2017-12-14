<?php

require("vendor/autoload.php");

$loader = new Twig_Loader_Filesystem("templates");
$twig = new Twig_Environment($loader);

$output = $twig->render("index.html.twig");

echo $output;