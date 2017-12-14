<?php ob_start();
require_once 'header.php';
require "apps.php";
if (!isset($_COOKIE["cartid"])) 
{ print "Invalid operation!!!"; require_once 'footer.php'; exit; }
$cartid = $_COOKIE['cartid'];
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
{ print "Could not connect to database"; require_once 'footer.php'; exit; }
if (!(@ mysql_select_db($databasename, $connection))) 
{ showerror(); require_once 'footer.php'; exit; }
$query = "SELECT item_no, sum(instock) FROM cartitems c, inventory v
WHERE cart_id={$cartid} AND c.book_id = v.book_id
GROUP BY item_no";
if (!($result = @ mysql_query ($query, $connection))) 
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
for ($i=1; $i<=$num_result; $i++) {
$row = @ mysql_fetch_array($result);
$item_no = $row["item_no"];
if (isset($_POST["{$item_no}"])) { 
$quantity = (int)$_POST["{$item_no}"];
if ($quantity <= $row["sum(instock)"]) {
if ($quantity > 0)
$query2 = "UPDATE cartitems SET quantity={$quantity}";
else 
$query2 = "DELETE FROM cartitems";
$query2 .= " WHERE cart_id={$cartid} AND cartitems.item_no={$item_no}";
if (!($result2 = @ mysql_query ($query2, $connection))) 
{ showerror(); require_once 'footer.php'; exit; }
}
}
}
$query = "SELECT * FROM cartitems WHERE cart_id={$cartid}";
if (!($result = @ mysql_query ($query, $connection))) 
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
if ($num_result == 0) {
$query = "DELETE FROM carts WHERE cart_id={$cartid}";
if (!($result = @ mysql_query ($query, $connection))) 
{ showerror(); require_once 'footer.php'; exit; }
setcookie("cartid", $cartid, time()-3600);
}
header("LOCATION: cartlist.php");
require_once 'footer.php';
?>
