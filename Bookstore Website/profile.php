<?php ob_start(); ?>
<?php
 require_once "header4.php";

?>
<?php
require "apps.php";
if (!isset($_SESSION["cust_id"]) || !isset($_SESSION["ip_addr"]))
	die("Invalid operation!!!<br /> Please login first");
$cust_id = $_SESSION["cust_id"];
$ip_addr = $_SESSION["ip_addr"];
if ($ip_addr != $_SERVER["REMOTE_ADDR"])
	die("Invalid operation!!!<br /> Please login first");
if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
	die("Could not connect");
if (!(@ mysql_select_db($databasename, $connection))) showerror();
$query = "SELECT * FROM customers WHERE cust_id={$cust_id}";
if (!($result = @ mysql_query ($query, $connection))) showerror();
	if (mysql_num_rows($result) == 0) 
	die("!!!Invalid operation!!!<br /> Please login first");
		else 
		{

			$row = @ mysql_fetch_array($result);
					
					
					print "<img src=\"images/newuser.png\" align=\"left\" style=\"margin-right:10px\"/>";
					print "<h4><a href=\"profile.php\">{$row['firstname']} {$row['lastname']}</a></h4><br/><br/>";	
					print "  <h3>{$row['email']}</h3><br/><br/><br/><br/><br/><br/><br/>";
					print "<div class=\"profileinfoselect\"><table width=\"500\"  border=\"2\" bordercolor=\"#FFFFFF\" borderstyle=\"soild\">
							<tr>
							<td width=\"250\"><h6>Address: {$row['address']}</h6><br/></td>
							<td width=\"250\"><h6>City/State: {$row['city']}, {$row['state']}</h6></td>
							</tr>
							<tr>
							<td width=\"250\"><h6>Zipcode: {$row['zipcode']}</h6></td>
							<td width=\"250\"><h6>Phone Number: {$row['phone']}</h6></td>
							</tr>
							</table></div>";
							
							
							


		}
?>
<?php
						

/* --------Recent Viewed Items------------
if(!$_SESSION['cust_id']){ 
$_SESSION['cust_id'] = rand(1, 1000000); 
mysql_query('INSERT INTO item_recent (cust_id) VALUES ('.$_SESSION['cust_id'].')'); 
} 

$productid = $_GET['book_id']; 

$query = 'SELECT * FROM item_recent WHERE cust_id = '.$_SESSION['cust_id'].''; 
$result = mysql_query($query); 
$row = mysql_fetch_array($result); 
mysql_query('UPDATE item_recent SET item_1="'.$productid.'", item_2="'.$row['item_1'].'", item_3="'.$row['item_2'].'" WHERE cust_id="'.$_SESSION['cust_id'].'"');  
*/
?>
		
<?php
 require_once "footer.php";

?>
