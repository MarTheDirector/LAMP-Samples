<?php
 require_once "header4.php";

?>
<?php
require "apps.php";?>
<title>Real Readers Bookstore</title>
</head>
<?php
if ($_GET['msg'])
{
       echo '<div class="logoutmsg">' . base64_decode(urldecode($_GET['msg'])) . '</div>';
	   
}
else
{
 	
}
?>


<br/><br/><br/><h2>Featured Book:</h2><br/><br/>
<?php
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
print "Could not connect to the database server.";
elseif (!(@ mysql_select_db($databasename, $connection)))
	showerror();
	else
	{
		$query = "SELECT title, authors, publisher, publishdate, ISBN, ISBN13, pages, price, description FROM books ORDER BY book_id";
		
		if (!($result = @ mysql_query($query, $connection)))
		showerror();
		else
		{
			$num = mysql_num_rows($result);
			if ($num == 0)
			print "<p><br/>Sorry, the book information could not be retrived at this time</p>";
			else 
			{
				
					$bookid = $row['1'];
					$bookid = 1;
					$row = @ mysql_fetch_array($result);
					
					

					print "<a href=\"select.php?isbn={$row['ISBN13']}\"><img src=\"bookimages/{$row['ISBN']}.jpg\" align=\"left\" width=\"282\" height=\"312\" style=\"margin-right:10px\" /></a>";
					print "<h2><a href=\"select.php?isbn={$row['ISBN13']}\">{$row['title']}</a></h2><br /><br/>";	
					print "<h3>By: {$row['authors']}</h3><br/><br/><br/><br/><br/><br/><br/><br/><br/><h5>&#36;{$row['price']}</h5><br/>";
					print '<form name="form1" id="form1" method="GET" action="addtocart.php">'; 
							
							$query2 = "SELECT sum(instock) FROM inventory WHERE book_id = {$bookid}";
							if (!($result2 = @ mysql_query ($query2, $connection))) showerror();
							else {
							$row2 = @ mysql_fetch_array($result2);
							$instock = $row2['sum(instock)'];
							if ($instock > 0) {	
							print '<input type="hidden" name="bookid" value=' . $bookid . ' />';
							print '<input type="submit" value="Add to Cart" />';
							}
							else print "<b>Out of Stock</b> &nbsp; ";
							}
							print '</form>';
					print "<div class=\"Bookinfo\"><table width=\"400\"  border=\"2\" bordercolor=\"#FFFFFF\" borderstyle=\"soild\">
							<tr>
							<td width=\"200\"><h6>Publication Info: {$row['publisher']}/{$row['publishdate']}</h6><br/></td>
							<td width=\"200\"><h6>Pages: {$row['pages']}</h6></td>
							</tr>
							<tr>
							<td width=\"200\"><h6>ISBN-10: {$row['ISBN']}</h6></td>
							<td width=\"200\"><h6>ISBN-13: {$row['ISBN13']}</h6></td>
							</tr>
							</table></div>";
					
					print "<br/><br/><br/><br/><br/>{$row['description']}<br/>";
					
					print "<br/>";
					print "<img src=\"images/featured1.jpg\" align=\"left\" width=\"542\" height=\"325\" style=\"margin-right:15px\" /><img src=\"images/featured2.jpg\" align=\"left\" width=\"542\" height=\"325\" />";
				
			}
		}
		
	}

?>
<?php
 require_once "footer.php";

?>

