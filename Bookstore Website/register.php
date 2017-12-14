<?php
 require_once "header.php";
?>
<script type="text/javascript">
<!--
function validate() {
if (form1.firstname.value.length == 0) {
alert("The First Name field cannot be blank");
return false;
}
if (form1.lastname.value.length == 0) {
alert("The Last Name field cannot be blank");
return false;
}
if (form1.email.value.length == 0) {
alert("The Email field cannot be blank");
return false;
}
if (form1.password1.value.length == 0) {
alert("The Password field cannot be blank");
return false;
}
if (form1.password2.value.length == 0) {
alert("The Confirm Password field cannot be blank");
return false;
}
if (form1.address.value.length == 0) {
alert("The Address field cannot be blank");
return false;
}
if (form1.city.value.length == 0) {
alert("The City field cannot be blank");
return false;
}
if (form1.state.value.length == 0) {
alert("The State field cannot be blank");
return false;
}
if (form1.zipcode.value.length == 0) {
alert("The Zipcode field cannot be blank");
return false;
}
return true;
}
// -->
</script>

<div id="table2">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form onSubmit="return(validate());" name="form1" id="form1" 
method="post" action="saveregister.php">
<tr>
<td width="108" height="36">&nbsp;</td>
<td width="84">&nbsp;</td>
<td width="408">&nbsp;</td>
</tr>
<tr>
<td height="40">&nbsp;</td>
<td colspan="2" valign="top"><b>To create an account, enter the following information below</b><br />
( <span style="color:#F00">*</span> is a required field)</td>
</tr>
<tr><td colspan="3" height="18">&nbsp;</td></tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>First Name:</td>
<td><input type="text" name="firstname" size="30" /></td></tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>Last Name:</td>
<td><input type="text" name="lastname" size="30" /></td></tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>Email:</td>
<td><input type="text" name="email" size="30" /></td></tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>Password:</td>
<td><input type="password" name="password1" size="30" /></td>
</tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>Confirm Password:
</td>
<td><input type="password" name="password2" size="30" /></td>
</tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>Address:</td>
<td><input type="text" name="address" size="50" /></td>
</tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>City:</td>
<td><input type="text" name="city" size="17" /></td>
</tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>State:</td>
<td><select name="state" size="1">
<?php
require "apps.php";
foreach ($usstates as $state) {
print "<option value=\"".$state."\">".$state."</option>";
}
?></select>
</td>
</tr>
<tr>
<td colspan="2" height="20" align="right"><span style="color:#F00">*</span>Zipcode:</td>
<td><input type="text" name="zipcode" size="17" /></td>
</tr>
<tr>
<td colspan="2" height="20" align="right">Phone:</td>
<td><input type="text" name="phone" size="17" /></td>
</tr>
<tr>
<td colspan="3" height="18">&nbsp;</td>
</tr>
<tr>
<td colspan="2" height="20">&nbsp;</td>
<td><input type="submit" value="Submit" /> &nbsp; &nbsp; 
&nbsp; &nbsp; <input type="reset" value="Cancel" /></td>
</tr>
<tr>
<td colspan="3" height="202">&nbsp;</td>
</tr>
</form></table></div>
<?php
 require_once "footer.php";
?>
