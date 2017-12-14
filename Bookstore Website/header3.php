<?php session_start();?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Real Readers Bookstore</title>
<link rel="stylesheet" type="text/css" href="Styles.css"/>
<link rel="stylesheet" type="text/css" href="font/fontstyle.css">

</head>
<body>

<div id="container">
<div id="header">



   </div>
<div id="navigation">
<div id="navcontainer"><a href="index.php"><img alt="Logo" src="images/logow.png" width="71" height="65" class="logo"/></a><ul id="nav">

			<li><a href="Booklist.php" class="main">Browse</a></li>
            <li><a href="search.php" class="main">Search</a></li>
            <li><a href="cartlist.php" class="main">Shopping Cart</a></li>
	
		<?php
if (!isset($_SESSION["cust_id"])) {
print '<li><a href="register.php" class=\"main2\">Register </a></li>';
print '<li><a href="login.php" class=\"main2\"> Login</a></li>';
} else {
	
	print"<li>";
	print"<a href=\"\" class=\"main\">";
	if (isset ($_SESSION["firstname"]))
	{
		print $_SESSION["firstname"] . " ";
		if (isset ($_SESSION["lastname"]))
	{
		print $_SESSION["lastname"];
	}
	}
	print"</a>";
	print"<ul>";
print '<li><a href="showorders.php" class=\"submenu\" size=\"25\">My Orders</a></li>';
print "<li><a href=\"profile.php\" class=\"submenu\">My Profile</a></li>";
print "<li><a href=\"editprofile.php\" class=\"submenu\">Edit Profile</a></li>";
print '<li><a href="logout.php" class=\"submenu\">Logout</a></li>';
}
print"</ul>";
print"</li>";
?>
 </ul></div>
   

</div>
   
<div id="contentsearch">