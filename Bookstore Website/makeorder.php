<?php
ob_start();
require_once 'header.php';
require "apps.php";
if (!isset($_SESSION["cust_id"]) || !isset($_COOKIE["cartid"]))
{ print "Invalid operation!!!"; require_once 'footer.php'; exit; }
$cust_id = $_SESSION["cust_id"];
$cartid = $_COOKIE["cartid"];
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
{ print "Could not connect to database"; require_once 'footer.php'; exit; }
if (!(@ mysql_select_db($databasename, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$query = "SELECT * FROM cartitems WHERE cart_id={$cartid} ORDER BY item_no";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
if ($num_result == 0)
{ print "Invalid operation!!!"; require_once 'footer.php'; exit; }
$creditcard = $_POST["creditcard"];
$retcode = checkCreditCard($creditcard);
if ($retcode != 0) {
switch ($retcode ) {
case 1: print "Credit Card field is blank"; break;
case 2: print "Card number must contain only digits and spaces"; break;
case 3: print "Invalid card number<br />Please check the number"; break;
}
require_once 'footer.php'; exit;
}
if (empty($_POST["expirymonth"]))
{ print "Expiry Month is blank"; require_once 'footer.php'; exit; }
if (empty($_POST["expiryyear"]))
{ print "Expiry Year is blank"; require_once 'footer.php'; exit; }
$expirydate = $_POST["expirymonth"] . $_POST["expiryyear"];
$query1 = "INSERT INTO orders SET cust_id={$cust_id}, orderdate=now(), 
creditcard='{$creditcard}', expirydate='{$expirydate}'";
if (!($result1 = @ mysql_query ($query1, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$order_id = mysql_insert_id();
for ($i=1; $i<=$num_result; $i++) {
$row = @ mysql_fetch_array($result);
$item_no = $row["item_no"];
$quantity = $row["quantity"];
$book_id = $row["book_id"];
$dateadded = $row["dateadded"];
$query2 = "INSERT INTO items VALUES 
({$order_id},{$item_no},{$quantity},{$book_id},'{$dateadded}')";
if (!($result2 = @ mysql_query ($query2, $connection))) 
{ showerror(); require_once 'footer.php'; exit; }
$query2 = "DELETE FROM cartitems WHERE cart_id={$cartid} AND 
cartitems.item_no={$item_no}";
if (!($result2 = @ mysql_query ($query2, $connection))) 
{ showerror(); require_once 'footer.php'; exit; }
}
$query = "DELETE FROM carts WHERE cart_id={$cartid}";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
setcookie("cartid", $cartid, time()-3600);
header("LOCATION: showorders.php");
require_once 'footer.php';
?>
