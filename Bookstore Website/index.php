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


<div id="titlespace"><img src="images/indextitle.png" width="550" height="300"/></div>
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
					
					

					print "<img src=\"images/indexbook.jpg\" id=\"indeximage\" />";
					print "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
					
					print"<img src=\"images/w.png\" id=\"intropara\" width=\"50\" height=\"50\" />";
					print "<div id=\"rightc\"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;elcome to the Real Readers Bookstore, this bookstore has some of the finest selections of books pertaining to computer code. The most popular computing languages include: HTML, CSS, PHP, Javascript, MySQL and much more! All of the popular computing languages constantly have introductory books written about them to help you become a better coder. We offer some of the best books and prices to help a person get started on their coding journey. Browse over our book collection however, make sure to create an account with us first! We only allow registered users to purchase books from our website. This is to make sure we can make a safe transaction without any difficulties. If you are having trouble you can use our search engine to help narrow down your search. Our prices are guaranteed to match or even beat amazon.com!  </p></div>";
					
					print "<p id=\"best\"><img src=\"images/sub.png\"  width=\"200\" height=\"40\" /></p>
					<div id=\"indexbest\">
					<a href=\"select.php?isbn=0470051515\"><img src=\"bookimages/0470051515.jpg\" align=\"left\" width=\"187\" height=\"252\" style=\"margin-right:35px; margin-top:30px; margin-left:45px;\"/></a>
					<a href=\"select.php?isbn=0764579665\"><img src=\"bookimages/0764579665.jpg\" align=\"left\" width=\"187\" height=\"252\" style=\"margin-right:35px; margin-top:30px;\"/></a>
					<a href=\"select.php?isbn=0132222205\"><img src=\"bookimages/0132222205.jpg\" align=\"left\" width=\"187\" height=\"252\" style=\"margin-right:35px; margin-top:30px;\"/></a>
					<a href=\"select.php?isbn=1430242515\"><img src=\"bookimages/1430242515.jpg\" align=\"left\" width=\"187\" height=\"252\" style=\"margin-right:35px; margin-top:30px;\"/></a>
					</div>";
					
			}
		}
		
	}

?>
<?php
 require_once "footer.php";

?>

