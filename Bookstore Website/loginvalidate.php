<?php ob_start(); ?>
<?php
 require_once "header.php";
 
?>
<?php
require "apps.php";
if (!isset($_POST["email"]) || !isset($_POST["password"])) die("Invalid operation!!!");
$goback = "<a href=\"login.php\">Try Again?</a>";
if (empty($_POST["email"]))
die("<div class=\"logoutmsg\">The <b>Email</b> field cannot be blank.{$goback}</div>"); 
if (empty($_POST["password"]))
die("<div class=\"logoutmsg\">The <b>Password</b> field cannot be blank.{$goback}</div>"); 
$email = trim($_POST["email"]);
$password = md5(trim($_POST["password"]));
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
die("<div class=\"logoutmsg\">Could not connect to the database system</div>");
if (!(@ mysql_select_db($databasename, $connection)))  showerror();
$query = "SELECT * FROM customers 
WHERE email='{$email}' AND password='{$password}'";
if (!($result = @ mysql_query ($query, $connection))) showerror();
if (mysql_num_rows($result) == 0)
die("<div class=\"logoutmsg\">Invalid email or password!{$goback}</div>");
$row = @ mysql_fetch_array($result);
session_start();
$_SESSION["cust_id"] = $row["cust_id"];
$_SESSION["ip_addr"] = $_SERVER["REMOTE_ADDR"];
$_SESSION["lastname"] = $row["lastname"];
$_SESSION["firstname"] = $row["firstname"];
header('Location: /welcome.php?msg=' . urlencode(base64_encode("Hello {$_SESSION['firstname']} {$_SESSION['lastname']}, welcome to the Code Readers Bookstore!")));
?>
<?php
 require_once "footer.php";

?>
