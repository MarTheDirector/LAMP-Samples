<?php
require_once 'header4.php';
require "apps.php";
if (!isset($_SESSION["cust_id"]))
{ print "Invalid operation!<br /> Please login first"; require_once 'footer.php'; exit; }
$cust_id = $_SESSION["cust_id"];
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
{ print "Could not connect to database"; require_once 'footer.php'; exit; }
if (!(@ mysql_select_db($databasename, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$query = "SELECT * FROM customers WHERE cust_id='{$cust_id}'";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
if ($num_result == 0) 
{ print "Invalid operation!<br /> Please login first"; require_once 'footer.php'; exit; }
$query = "SELECT * FROM orders WHERE cust_id='{$cust_id}' ORDER BY order_id"; 
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
if ($num_result == 0)
{ print "<div class=\"logoutmsg\"><b>You haven't ordered anything yet!</b> <a href=\"Booklist.php\">Why not order some books?</a></div>"; require_once 'footer.php'; exit; }
print "<b>You have {$num_result} order";
if ($num_result > 1) print "s";
print "</b><br />";
for ($n=1; $n<=$num_result; $n++) {
$row = @ mysql_fetch_array($result);
print "<br /><b>Order {$n}:</b> Made on {$row['orderdate']}, ";
if (empty($row["confirmdate"])) print "Processing<br />";
else print "Processed on {$row['confirmdate']}";
print '<table class="backcolor2" width="100%" border="1" bgcolor="#F0F0F0">';
print '<tr><td width="90">Date selected</td><td>Item Description</td>';
print '<td>Unit Price</td><td>Qty</td><td align="right" width="40">Total</td></tr>';
$total = 0.0;
$order_id = $row["order_id"];
$query2 = "SELECT * FROM items, books
WHERE order_id={$order_id} AND items.book_id=books.book_id
ORDER BY item_no";
if (!($result2 = @ mysql_query ($query2, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$num_result2 = mysql_num_rows($result2);
for ($i=1; $i<=$num_result2; $i++) {
$row2 = @ mysql_fetch_array($result2);
print "<tr><td>{$row2['dateadded']}</td>";
print "<td><a href=\"select.php?isbn={$row2['ISBN']}\">{$row2['title']}</a><br />";
print "- {$row2['authors']}<br />ISBN-10: {$row2['ISBN']}<br />ISBN-13: 
{$row2['ISBN13']}</td>";
print "<td align=\"right\">\${$row2['price']}</td>";
print "<td align=\"right\">{$row2['quantity']}</td>";
$subtotal = $row2['price'] * $row2['quantity'];
print "<td align=\"right\">\${$subtotal}</td>";
print "</tr>";
$total += $subtotal;
}
print '<tr><td colspan="4">&nbsp;</td>';
print "<td align=\"right\">\${$total}</td>"; 
print '</tr>';
print "</table>";
}
require_once 'footer.php';
?>