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

if (!isset($_POST["phone"]) || empty($_POST["phone"]))
	print "<div class=\"logoutmsg\">Your phone number cannot be blank</div>";	
	else
	{
		$phone = $_POST["phone"];	

if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
	die("<div class=\"logoutmsg\">Could not connect to the Bookstore database</div>");
if (!(@ mysql_select_db($databasename, $connection))) showerror();

$query = "SELECT * FROM customers WHERE cust_id={$cust_id}";

if (!($result = @ mysql_query ($query, $connection))) showerror();
	if (mysql_num_rows($result) == 0) 
	die("<div class=\"logoutmsg\">You must be <a href=\"login.php\">logged in</a> to access this page. </div>");
	
	
			$row = @mysql_fetch_array($result);
			if ($phone == $row["phone"])
			{
				$url = $_SERVER['HTTP_REFERER'];
				header("Location: {$url}");
			}
			
			$query = "UPDATE customers SET phone = '{$phone}' WHERE cust_id='{$cust_id}'";
			if (!($result = @ mysql_query ($query, $connection))) showerror();
			else
			{
				$_SESSION["phone"] = $phone;	
				print "<div class=\"logoutmsg\"><b>You have changed your phone number <b>To:</b> {$phone}.</div>";
			}
	}
?>				


<?php
 require_once "footer.php";

?>
