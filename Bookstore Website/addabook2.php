<?php ob_start(); ?>
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
if (!isset($_POST["title"])||empty($_POST["title"])) die("The Title field is blank");
$title = $_POST["title"];
if (!isset($_POST["authors"])|| empty($_POST["authors"])) die("The Authors is blank");
$authors = $_POST["authors"];
if (!isset($_POST["publisher"])) $publisher = ""; 
else $publisher = $_POST["publisher"];
if (!isset($_POST["pubdate"])) $pubdate = ""; 
else $pubdate = $_POST["pubdate"];
if (!isset($_POST["isbn10"]) || empty($_POST["isbn10"]) || !isset($_POST["isbn13"]) || 
empty($_POST["isbn13"])) die("Both ISBN fields cannot be blank");
$isbn10 = $_POST["isbn10"]; $isbn13 = $_POST["isbn13"];
if (!isset($_POST["pages"])) $pages = 0; 
else $pages = (int) $_POST["pages"];
if (!isset($_POST["price"])) $price = 0.0;
else $price = (real)$_POST["price"];
if (!isset($_POST["description"])) $desc = ""; 
else $desc = $_POST["description"];
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
die("Could not connect");

if (!(@ mysql_select_db($databasename, $connection)))
showerror();

$query = "SELECT * FROM books WHERE ISBN='{$isbn10}' OR ISBN13='{$isbn13}'";
if (!($result = @ mysql_query ($query, $connection)))
showerror();
$num_result = mysql_num_rows($result);
if ($num_result != 0) 
	die("The book with ISBN-{$isbn10},{$isbn13} is already in the database.<br /> The Add operation fails."); 

$query = "INSERT INTO books VALUES
(NULL,'{$title}','{$authors}','{$isbn10}', '{$isbn13}','{$publisher}','{$pubdate}',{$pages}, {$price},'{$desc}')";
if (!($result = @ mysql_query ($query, $connection)))
showerror();

$book_id = mysql_insert_id();

header ("Location: bookreceipt.php?book_id={$book_id}");
?>
</body>


</body>
</html>
