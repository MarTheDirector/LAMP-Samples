<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Regular Expression Test</title>
</head>

<body>
<h2> Regular Expression Test Result: </h2>
<?php


require "apps.php"; 


if (!isset($_GET['emailaddr']) || empty($_GET['emailaddr']))
{
	print "No email address provided! <br />:";
	exit;
}
$emailaddr = $_GET['emailaddr'];

if (checkEmail($emailaddr))
	print "the email address is valid!";



?>
</body>
</html>