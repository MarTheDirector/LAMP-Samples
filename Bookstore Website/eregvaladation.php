<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Regular Expression Test</title>
</head>

<body>
<h2> Regular Expression Test Result: </h2>
<?php

if (!isset($_GET['rege']) || empty($_GET['rege']))
{
	print "No Regular Expression provided! <br />:";
	exit;
}
$rege = $_GET['rege'];
if (!isset($_GET['instring']) || empty($_GET['instring']))
{
	print "No Regular Expression provided! <br />:";
	exit;
}
$instring = $_GET['instring'];

if (ereg($rege, $instring))
	print "the input string ({$instring}) contains pattern ({$rege})";
	else
	print "the input string  DOES NOT ({$instring}) contains pattern ({$rege})";


?>
</body>
</html>