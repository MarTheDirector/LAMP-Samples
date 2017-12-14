<?php ob_start(); ?>
<?php require_once "header.php";?>

<title>Bookstore</title>
</head>



<?php
if (!isset($_SESSION["book_id"]))
{
		print "<div class=\"logoutmsg\"><b>Your Shopping Cart is empty!</b> <a href=\"Booklist.php\">Why not add some books?</a></div>";
		exit;
}
if (isset($_SESSION["book_id"]))
{
	unset($_SESSION["book_id"]);
	print "<div class=\"logoutmsg\">your shopping cart has been empited.</div>";
}
else
print "You currently have no books in your website";
?>
<?php
 require_once "footer.php";
?>
