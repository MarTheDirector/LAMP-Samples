<?php ob_start();?>
<?php require_once "header.php"; ?>
<?php
require "apps.php";
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
{ print "Could not connect to database"; require_once 'footer.php'; exit; }
if (!(@ mysql_select_db($databasename, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
if (!isset($_COOKIE["cartid"])) {
$query = "INSERT INTO carts SET datecreated = now()";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$cartid = mysql_insert_id();
setcookie("cartid", $cartid);
} else $cartid = $_COOKIE['cartid'];
$bookid = $_GET["bookid"];
$query = "SELECT * FROM cartitems WHERE cart_id={$cartid} AND book_id={$bookid}";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
if ($num_result == 0) { // the book is not on the cart
$query = "SELECT MAX(item_no) FROM cartitems WHERE cart_id={$cartid}";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$row = @ mysql_fetch_array($result);
$item_no = $row['MAX(item_no)']+1;
$query = "INSERT INTO cartitems VALUES ($cartid, $item_no, 1, $bookid, now())";
if (!($result = @ mysql_query($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
} else { // the book is on the cart already, and only increase quantity
$query = "UPDATE cartitems SET quantity = quantity + 1 WHERE cart_id={$cartid}
AND book_id={$bookid}";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
}
header("LOCATION: cartlist.php");
?>
<?php
   require_once "footer.php";
?>   