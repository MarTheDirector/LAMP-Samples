<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Book Listing</title>
</head>

<body>
<body>
<?php
require "apps.php";
if (!isset($_GET["book_id"])||empty($_GET["book_id"])) die("To access this page you must provide the book id.");
$book_id = $_GET["book_id"];

if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
die("Could not connect");

if (!(@ mysql_select_db($databasename, $connection)))
showerror();

$query = "SELECT * FROM books WHERE book_id='{$book_id}'";
if (!($result = @ mysql_query ($query, $connection)))
showerror();
$num_result = mysql_num_rows($result);
if ($num_result == 0) 
	die("The book with Book ID-{$book_id} is not in the database.<br /> The Add operation fails."); 
	$row = mysql_fetch_array();

$query = "INSERT INTO books VALUES
(NULL,'{$title}','{$authors}','{$isbn10}', '{$isbn13}','{$publisher}','{$pubdate}',{$pages}, {$price},'{$desc}')";
if (!($result = @ mysql_query ($query, $connection)))
showerror();

$book_id = mysql_insert_id();
print("The following items have successfully been written into database ({$book_id}):
<br /><br />");
print("Title: {$row['title']}<br />");
print("Authors: {$row['authors']}<br />");
print("Publisher: {$row['publisher']}<br />");
print("Publish Date: {$row['pubdate']}<br />");
print("ISBN-10: {$row['isbn10']}<br />");
print("ISBN-13: {$row['isbn13']}<br />");
print("Pages: {$row['pages']}<br />");
print("Price: {$row['price']}<br />");
print("Description: {$row['description']}<br />");
?>
</body>


</body>
</html>
