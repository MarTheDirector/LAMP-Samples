<?php
require_once "header4.php";
?>
<?php
require "apps.php";
if (!isset($_COOKIE["cartid"]))
{ print "<div class=\"logoutmsg\"><b>Your Shopping Cart is empty!</b> <a href=\"Booklist.php\">Why not add some books?</a></div>"; require_once 'footer.php'; exit; }
$cartid = $_COOKIE['cartid'];
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
{ print "Could not connect"; require_once 'footer.php'; exit; }
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
print '<table border="0" width="100%">';
print '<tr><td height="16"><b>Shopping Cart</b></td>';
print '<td align="right"><form name="form1" id="form1" method="post"
action="checkout.php">';
print '<input type="submit" value="Check Out" />';
print '</form></td></tr>';
print '</table>';
print '<table bgcolor="#F0F0F0" width="100%" border="1">';
print '<form name="form2" id="form2" method="post" action="updatecart.php">';
print '<tr><td width="90">Date Added</td><td>Item Description</td>';
print '<td>Unit Price</td><td>Qty</td><td align="right" width="40">Total</td></tr>';
$total = 0.0;
for ($i=1; $i<=$num_result; $i++) {
$row = @ mysql_fetch_array($result);
print "<tr><td>{$row['dateadded']}</td>";
print "<td><a href=\"select.php?isbn={$row['ISBN']}\">{$row['title']}</a><br />";
print "- {$row['authors']}<br />ISBN-10: {$row['ISBN']}<br />ISBN-13:
{$row['ISBN13']}</td>";
print "<td align=\"right\">\${$row['price']}</td>";
print "<td><input type=\"text\" name=\"{$row['item_no']}\" value=\"{$row['quantity']}\"
size=\"1\" id=\"qty\"/></td>";
$subtotal = $row['price'] * $row['quantity'];
print "<td align=\"right\">\${$subtotal}</td>";
print "</tr>";
$total += $subtotal;
}
print '<tr><td colspan="2">&nbsp;</td>';
print '<td colspan="2" align="right"><input type="submit" value="Update" /></td>';
print "<td align=\"right\">\${$total}</td>";
print "</tr></form></table>";
?>
<?php
   require_once "footer.php";
?>