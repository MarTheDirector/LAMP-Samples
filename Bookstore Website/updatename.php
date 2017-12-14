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

if (!isset($_POST["lastname"]) || empty($_POST["lastname"]))
	print "<div class=\"logoutmsg\">Your last name cannot be blank</div>";	
elseif (!isset($_POST["firstname"]) || empty($_POST["firstname"]))
	print "<div class=\"logoutmsg\">Your first name cannot be blank</div>";	
	else
	{
		$lastname = $_POST["lastname"];	
		$firstname = $_POST["firstname"];	

if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
	die("<div class=\"logoutmsg\">Could not connect to the Bookstore database</div>");
if (!(@ mysql_select_db($databasename, $connection))) showerror();

$query = "SELECT * FROM customers WHERE cust_id={$cust_id}";

if (!($result = @ mysql_query ($query, $connection))) showerror();
	if (mysql_num_rows($result) == 0) 
	die("<div class=\"logoutmsg\">You must be <a href=\"login.php\">logged in</a> to access this page. </div>");
	
	
			$row = @mysql_fetch_array($result);
			if ($lastname == $row["lastname"] && $firstname == $row["firstname"])
			{
				$url = $_SERVER['HTTP_REFERER'];
				header("Location: {$url}");
			}
			
			$query = "UPDATE customers SET lastname = '{$lastname}', firstname = '{$firstname}' WHERE cust_id='{$cust_id}'";
			if (!($result = @ mysql_query ($query, $connection))) showerror();
			else
			{
				$_SESSION["lastname"] = $lastname;	
				$_SESSION["firstname"]= $firstname;
				print "<div class=\"logoutmsg\"><b>You have changed your name from:</b> {$row['firstname']} {$row['lastname']}. <b>To:</b> {$firstname} {$lastname}</div>";
			}
	}
?>				


<?php
 require_once "footer.php";

?>
