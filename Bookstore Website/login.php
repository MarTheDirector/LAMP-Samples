<?php
 require_once "header.php";

?>
<div id="table">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form name="form1" id="form1" method="post" action="loginvalidate.php">
<tr>
<td width="86" height="36">&nbsp;</td>
<td width="76">&nbsp;</td>
<td width="338">&nbsp;</td>
</tr>
<tr>
<td height="40">&nbsp;</td>
<td colspan="2" valign="top"><b>To login, enter the following information below</b><br />
(Don't have an account? <a href="register.php">Register</a> first)</td>
</tr>
<tr><td colspan="3" height="18">&nbsp;</td></tr>
<tr>
<td colspan="2" height="20" align="right">Your Email:</td>
<td><input type="text" name="email" size="40" /></td></tr>
<tr>
<td colspan="2" height="20" align="right">Your Password:</td>
<td><input type="password" name="password" size="40" /></td>
<tr>
<td colspan="3" height="18">&nbsp;</td>
</tr>
<tr>
<td colspan="2" height="20">&nbsp;</td>
<td><input name="submit" type="submit" value="Login" /></td>
</tr>
<tr>
<td colspan="3" height="202">&nbsp;</td>
</tr>
</form></table>
</div>

<?php
 require_once "footer.php";

?>
