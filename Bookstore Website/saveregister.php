<?php ob_start(); ?>
<?php
 require_once "header.php";
?>
<?php
 require_once "apps.php";

?>


<?php

if (!isset($_POST['lastname']) || empty($_POST['lastname']))
{
	print "No last name provided! <br />:";
	exit;
}
$lastname = trim($_POST['lastname']);

if (!isset($_POST['firstname']) || empty($_POST['firstname']))
{
	print "No First name provided! <br />:";
	exit;
}
$firstname = trim($_POST['firstname']);

if (!isset($_POST['email']) || empty($_POST['email']))
{
	print "No email address provided! <br />:";
	exit;
}
$email = trim($_POST['email']);
 if (checkEmail($email))
 {exit;}

if (!isset($_POST['password1']) || empty($_POST['password1']))
{
	print "No password provided! <br />:";
	exit;
}
$password = trim($_POST['password1']);

if (!isset($_POST['password2']) || empty($_POST['password2']))
{
	print "No password provided! <br />:";
	exit;
}
$password2 = trim($_POST['password2']);

if ($password !== $password2)
{
	print " Your passwords do not match each other.";
	exit;
}	
$password = md5($_POST['password1']);

if (!isset($_POST['address']) || empty($_POST['address']))
{
	print "No address provided! <br />:";
	exit;
}
$address = $_POST['address'];

if (!isset($_POST['city']) || empty($_POST['city']))
{
	print "No city provided! <br />:";
	exit;
}
$city = $_POST['city'];

if (!isset($_POST['zipcode']) || empty($_POST['zipcode']))
{
	print "No zipcode provided! <br />:";
	exit;
}
$zipcode = $_POST['zipcode'];

if (!isset($_POST['phone']) || empty($_POST['phone']))
{
	$phone = $_POST['phone'];
}

if (!isset($_POST['state']) || empty($_POST['state']))
{
	
}
$state = $_POST['state'];


if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
die("Could not connect");
if (!($result = @ mysql_select_db ($databasename, $connection)))
showerror();
$query = "SELECT * FROM customers WHERE EMAIL='{$email}'";
if (!($result = @ mysql_query ($query, $connection)))
showerror();
$num_result = mysql_num_rows($result);
if ($num_result != 0) 
	die("Another account exists with the {$email} email.<br /> If this is your account please go to the Login page."); 
	
	
$query = "INSERT INTO customers VALUES
(NULL,'{$lastname}','{$firstname}','{$email}', '{$password}','{$address}','{$city}','{$state}', '{$zipcode}','{$phone}')";
if (!($result = @ mysql_query ($query, $connection)))
showerror();

$cust_id = mysql_insert_id();

header ("Location: welcome.php?cust_id={$cust_id}");




?>


  <?php
 require_once "footer.php";
?>