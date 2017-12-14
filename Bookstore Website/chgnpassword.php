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
	
	
			$row = @mysql_fetch_array($result);
?><p>
<b>To change your password fill out the form below:</b><br/>			
<table border="0" width="100%" bgcolor="#F0F0F0">
<form name="form1" id="form1" method="POST" action="passchange.php">
<tr><td width="170" align="right">Current Password: </td><td><input type="password" name="Cpassword" size="40" /></td></tr>
<tr><td width="170" align="right">New Password: </td><td><input type="password" name="Npassword" size="40" /></td></tr>
<tr><td width="170" align="right">Confirm New Password: </td><td><input type="password" name="CNpassword" size="40" /></td></tr>
<tr><td width="170" align="right"><input name="submit" type="submit" value="Change" /></td><td><input type="reset" value="Cancel" /></td></tr>
</form>
</table></p>
<b>Profile Edit Menu:</b><br/><br/>
<div id="editwrap">  
	 
	<div class="item first"> 
		<a href="chgnpassword.php"><img src="images/grayscalechangepass.png" onmouseover="this.src='images/changepass.png'" onmouseout="this.src='images/grayscalechangepass.png'" /></a> 
		 
	</div> 
	<div class="item"> 
		<a href="chgname.php"><img src="images/grayscalechangename.png" onmouseover="this.src='images/changename.png'" onmouseout="this.src='images/grayscalechangename.png'"/></a> 
		 
	</div> 
	<div class="item"> 
		<a href="chgaddress.php"><img src="images/grayscalechangeadd.png" onmouseover="this.src='images/changeadd.png'" onmouseout="this.src='images/grayscalechangeadd.png'"/></a> 
		 
	</div> 
	<div class="item first"> 
		<a href="chgemail.php"><img src="images/grayscalechangeemail.png" onmouseover="this.src='images/changeemail.png'" onmouseout="this.src='images/grayscalechangeemail.png'"/></a> 
		 
	</div> 
	<div class="item"> 
		<a href="chgphone.php"><img src="images/grayscalechangephone.png" onmouseover="this.src='images/changephone.png'" onmouseout="this.src='images/grayscalechangephone.png'"/></a> 
		 
	</div> 
	<div class="item"> 
		<a href="#"><img src="images/grayscalechangepic.png" onmouseover="this.src='images/changepic.png'" onmouseout="this.src='images/grayscalechangepic.png'"/></a> 
		 
	</div> 
</div> 
<?php
 require_once "footer.php";

?>