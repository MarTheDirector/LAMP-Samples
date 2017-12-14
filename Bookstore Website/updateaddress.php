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

if (!isset($_POST["address"]) || empty($_POST["address"]))
	print "<div class=\"logoutmsg\">Your address cannot be blank</div>";	
elseif (!isset($_POST["city"]) || empty($_POST["city"]))
	print "<div class=\"logoutmsg\">Your city cannot be blank</div>";
elseif (!isset($_POST["zipcode"]) || empty($_POST["zipcode"]))
	print "<div class=\"logoutmsg\">Your zipcode cannot be blank</div>";	
	else
	{
		$address = $_POST["address"];	
		$city = $_POST["city"];
		$zipcode = $_POST["zipcode"];
		$state = $_POST["state"];		

if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
	die("<div class=\"logoutmsg\">Could not connect to the Bookstore database</div>");
if (!(@ mysql_select_db($databasename, $connection))) showerror();

$query = "SELECT * FROM customers WHERE cust_id={$cust_id}";

if (!($result = @ mysql_query ($query, $connection))) showerror();
	if (mysql_num_rows($result) == 0) 
	die("<div class=\"logoutmsg\">You must be <a href=\"login.php\">logged in</a> to access this page. </div>");
	
	
			$row = @mysql_fetch_array($result);
			if ($address == $row["address"])
			{
				$url = $_SERVER['HTTP_REFERER'];
				header("Location: {$url}");
			}
			
			$query = "UPDATE customers SET address = '{$address}', city = '{$city}', zipcode = '{$zipcode}', state = '{$state}' WHERE cust_id='{$cust_id}'";
			if (!($result = @ mysql_query ($query, $connection))) showerror();
			else
			{
				$_SESSION["address"] = $address;	
				$_SESSION["city"]= $city;
				$_SESSION["zipcode"] = $zipcode;	
				$_SESSION["state"]= $state;
				print "<div class=\"logoutmsg\"><b>You have changed your address from:</b> {$row['address']}, {$row['city']}, {$row['state']} {$row['zipcode']}. <b>To:</b> {$address}, {$city}, {$state} {$zipcode}</div>";
			}
	}
?>				


<?php
 require_once "footer.php";

?>
