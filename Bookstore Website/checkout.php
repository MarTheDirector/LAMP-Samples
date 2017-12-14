<?php
require_once 'header4.php';
require "apps.php";
if (!isset($_COOKIE["cartid"]))
{ print "<div class=\"logoutmsg\"><b>Your Shopping Cart is empty!</b> <a href=\"Booklist.php\">Why not add some books?</a></div>"; require_once 'footer.php'; exit; }
$cartid = $_COOKIE['cartid'];
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
{ print "Could not connect to database"; require_once 'footer.php'; exit; }
if (!(@ mysql_select_db($databasename, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$query = "SELECT * FROM cartitems, books 
WHERE cart_id={$cartid} AND cartitems.book_id=books.book_id
ORDER BY item_no";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
if ($num_result == 0)
{ print "<div class=\"logoutmsg\"><b>Your Shopping Cart is empty!</b> <a href=\"Booklist.php\">Why not add some books?</a></div>"; require_once 'footer.php'; exit; }
if (!isset($_SESSION["cust_id"]))
{ print "<br /><b>To check out, you must <a href=\"login.php\">login</a> your account 
first</b>"; require_once 'footer.php'; exit; }
print '<br /><b>Please provide your Credit Card information:</b><br />';
print '<table border="0" width="100%" bgcolor="#F0F0F0">';
print '<form name="form1" id="form1" method="post" action="makeorder.php">';
print '<tr><td width="170" align="right">Credit Card Number(<span style="color:#F00">*</span>): </td><td><input type="text" 
name="creditcard" size="22" /></td></tr>';
print '<tr><td  align="right">Expiry Date(<span style="color:#F00">*</span>): </td><td><input type="text" 
name="expirymonth" size="1" />/<input type="text" name="expiryyear" size="1" /> 
(mm/yy)</td></tr>';
print '<tr><td>&nbsp;</td><td><input type="submit" value="Proceed the Order" 
/></td></tr>';
print '</form></table>';
print '<br /><b>Current Shopping Cart</b><br />';
print '<table class="backcolor2" width="100%" border="1" bgcolor="#F0F0F0">';
print '<tr><td width="90">Date Added</td><td>Item Description</td>';
print '<td width="50">Unit Price</td><td>Qty</td><td align="right" 
width="50">Total</td></tr>';
$total = 0.0;
for ($i=1; $i<=$num_result; $i++) {
$row = @ mysql_fetch_array($result);
print "<tr><td>{$row['dateadded']}</td>";
print "<td><a href=\"select.php?isbn={$row['ISBN']}\">{$row['title']}</a><br />";
print "- {$row['authors']}<br />ISBN-10: {$row['ISBN']}<br />ISBN-13: 
{$row['ISBN13']}</td>";
print "<td align=\"right\">\${$row['price']}</td>";
print "<td>{$row['quantity']}</td>";
$subtotal = $row['price'] * $row['quantity'];
print "<td align=\"right\">\${$subtotal}</td>";
print "</tr>";
$total += $subtotal;
}
print '<tr><td colspan="2">&nbsp;</td>';
print '<td colspan="2" align="right">&nbsp;</td>';
print "<td align=\"right\">\${$total}</td>"; 
print '</tr>';
print "</table>";
require_once 'footer.php';
?>