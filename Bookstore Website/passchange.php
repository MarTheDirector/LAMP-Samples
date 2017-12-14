<?php ob_start(); ?>
<?php
 require_once "header4.php";
?>
<?php
 require "apps.php";
 
if (!isset($_SESSION["cust_id"]) || !isset($_SESSION["ip_addr"]))
die("<div class=\"logoutmsg\">You must be <a href=\"login.php\">logged in</a> to access this page. </div>");
$cust_id = $_SESSION["cust_id"];
$ip_addr = $_SESSION["ip_addr"];
if ($ip_addr != $_SERVER["REMOTE_ADDR"])
die("<div class=\"logoutmsg\">You must be <a href=\"login.php\">logged in</a> to access this page. </div>");

if (!isset($_POST["Cpassword"]) || empty($_POST["Cpassword"]))
	print "<div class=\"logoutmsg\">Invaild password</div>";	
elseif (!isset($_POST["Npassword"]) || empty($_POST["Npassword"]))
	print "<div class=\"logoutmsg\">The new password cannot be blank</div>";
elseif (!isset($_POST["CNpassword"]) || empty($_POST["CNpassword"]))
	print "<div class=\"logoutmsg\">The new password cannot be blank</div>";	
else
	{
		$Cpassword = md5($_POST["Cpassword"]);	
		$Npassword = $_POST["Npassword"];
		$CNpassword = $_POST["CNpassword"];

		if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
			die("<div class=\"logoutmsg\">Could not connect to the Bookstore database</div>");
		if (!(@ mysql_select_db($databasename, $connection))) showerror();
		
		$query = "SELECT * FROM customers WHERE cust_id='{$cust_id}' AND password='{$Cpassword}'";
		if (!($result = @ mysql_query ($query, $connection))) showerror();
		if (mysql_num_rows($result) == 0) 
			die("<div class=\"logoutmsg\">You must be <a href=\"login.php\">logged in</a> to access this page. </div>");
	
		if ($Npassword != $CNpassword)
			print "<div class=\"logoutmsg\">Your new passwords do not match each other <a href=\"chgnpassword.php\"> Try Again?</a></div>";
		else {
			$pass = md5($Npassword);
			$query = "UPDATE customers SET password = '{$pass}' WHERE cust_id='{$cust_id}'";
			if (!($result = @ mysql_query ($query, $connection))) showerror();
			else
				print "<div class=\"logoutmsg\">You have changed your password.</div>";
		}
	}
?>				


<?php
 require_once "footer.php";
?>
