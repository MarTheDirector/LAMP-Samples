<?php

$hostname = "mysql16.000webhost.com";
$dbusername = "a4277949_freeman";
$dbpassword = "ridehardspr2";  
$databasename = "a4277949_book";

function showerror()
{
		print "Error" . mysql_errno() . ": " . mysql_error();
}

function checkEmail($email) {
$validEmailExpr = "^[0-9a-z~!#$%&_-]+(\.[0-9a-z~!#$%&_-]+)*" .
"@[0-9a-z~!#$%&_-]+([.][0-9a-z~!#$%&_-]+)+$";
if (empty($email)) {
print "The email field cannot be blank";
return false;
}
elseif (!eregi($validEmailExpr, $email)) {
print "The email address must be in the name@domain format. <b> Example: kitty57@winthrop.edu</b>";
return false;
}
elseif (strlen($email) > 50) {
print "The email address can be no longer than 50 characters";
return false;
}
return true;
}

$usstates = array("Alabama", "Alaska", "Arizona", "Arkansas", "California",
                  "Colorado", "Connecticut", "Delaware", "Florida", "Georgia",
				  "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa",
				  "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland",
				  "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri",
				  "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey",
				  "New Mexico", "New York", "North Carolina", "North Dakota","Ohio",
				  "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina",
				  "South Dakota", "Tennessee", "Texas", "Utah", "Vermont",
                  "Virginia","Washington","Washington D.C.","West Virginia","Wisconsin",
                  "Wyoming");
				  
				  
 function checkCreditCard($cardnum) {
// the first step
if (empty($cardnum)) return 1;   // blank field 
if (!ereg("^[0-9 ]*$", $cardnum)) return 2;   // not contain only digits and spaces 
$cardnum = str_replace(" ", "", $cardnum);
// the second step
$type = "";
$length = 0;
$firstOne = intval(substr($cardnum, 0, 1));
$firstTwo = intval(substr($cardnum, 0, 2));
$firstFour = intval(substr($cardnum, 0, 4));
if ($firstTwo >= 51 && $firstTwo <= 55) {
$type = "MasterCard"; $length=16;
}
elseif ($firstOne == 4) {
$type = "VISA"; $length=16;  // or 13
}
elseif ($firstTwo==34 || $firstTwo==37) {
$type = "American Express"; $length=15;
}
elseif ($firstFour==6011) {
$type = "Discover"; $length=16;
}
if (empty($type)) return 3; // invalid card number
if (strcmp($type, "VISA") == 0) {
$length = strlen($cardnum);
if ($length!=16 && $length!=13) return 3;
}
elseif ($length != strlen($cardnum)) return 3;
// The third step
$check = 0;
for ($i=$length-1; $i>=0; $i-=2)
$check += intval(substr($cardnum, $i, 1));
for ($i=$length-2; $i>=0; $i-=2) {
$double = intval(substr($cardnum, $i, 1)) * 2;
$check += $double;
if ($double >= 10) $check -= 9;
}
if ($check % 10 != 0) return 3;
return 0;    // card number is valid
}



function checkmydate($adate) {
if (empty($adate)) {
print "The Date field cannot be blank"; return false;
}
elseif (!ereg("^([0-9]{2})/([0-9]{2})/([0-9]{4})$", $adate, $parts)) {
print "The entered date in not valid in the format MM/DD/YYYY";
return false;
}
elseif (!checkdate($parts[1], $parts[2], $parts[3])) {
print "The date is invalid. Please check the month and day";
return false;
}
return true;
}


?>