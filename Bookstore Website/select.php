<?php
require_once 'header4.php';
require "apps.php";
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
{ print "Could not connect to database"; require_once 'footer.php'; exit; }
if (!(@ mysql_select_db($databasename, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$isbn = $_GET["isbn"];
if (!isset($isbn) || empty($isbn))
{ print "<p><br /> Sorry, no book is found!</p>"; require_once 'footer.php'; exit; }
$query = "SELECT * FROM books WHERE ISBN='{$isbn}' OR ISBN13='{$isbn}'";
if (!($result = @ mysql_query ($query, $connection)))
{ showerror(); require_once 'footer.php'; exit; }
$num_result = mysql_num_rows($result);
if ($num_result == 0)
{ print "<p><br /> Sorry, no book is found!</p>"; require_once 'footer.php'; exit; }
$row = @ mysql_fetch_array($result);
print "<img src=\"bookimages/{$row['ISBN']}.jpg\" align=\"left\" width=\"282\" height=\"312\" style=\"margin-right:10px\" border=\"1\" style=\"border-color:#F0F0F0\"/>";
					print "<h4><a href=\"select.php?isbn={$row['ISBN13']}\">{$row['title']}</a></h4><br /><br/>";	
					print "<h3>By: {$row['authors']}</h3><br/><br/><br/><br/><br/><br/><br/><br/><br/><h5>&#36;{$row['price']}</h5><br/>";

print '<form name="form1" id="form1" method="GET" action="addtocart.php">'; 
$bookid = $row['book_id'];
$query2 = "SELECT sum(instock) FROM inventory WHERE book_id = {$bookid}";
if (!($result2 = @ mysql_query ($query2, $connection))) showerror();
else {
$row2 = @ mysql_fetch_array($result2);
$instock = $row2['sum(instock)'];

if ($instock > 0) {

print '<input type="hidden" name="bookid" value=' . $bookid . ' />';
print '<input type="submit" value="Add to Cart" />';
}
else print "<span style=\"color:#F00\"><b>Out of Stock</b></span> &nbsp; ";
}
print '</form>';
print "<div class=\"Bookinfoselect\"><table width=\"500\"  border=\"2\" bordercolor=\"#FFFFFF\" borderstyle=\"soild\">
							<tr>
							<td width=\"300\"><h6>Publication Info: {$row['publisher']}/{$row['publishdate']}</h6><br/></td>
							<td width=\"250\"><h6>Pages: {$row['pages']}</h6></td>
							</tr>
							<tr>
							<td width=\"300\"><h6>ISBN-10: {$row['ISBN']}</h6></td>
							<td width=\"250\"><h6>ISBN-13: {$row['ISBN13']}</h6></td>
							</tr>
							</table></div>";
					
					print "<br/><br/><br/><br/><br/>{$row['description']}<br/><br/><br/>";
					print "<div class=\"selectmsg\"><b>Done reading?</b><a href=\"Booklist.php\"> Back to browsing</a></div>";
require_once 'footer.php';
?>