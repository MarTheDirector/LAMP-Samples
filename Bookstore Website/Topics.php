<?php
if (!isset($_SERVER["PHP_AUTH_USER"]) || !isset($_SERVER["PHP_AUTH_PW"]) || 
$_SERVER["PHP_AUTH_USER"] != "csci241" ||$_SERVER["PHP_AUTH_PW"] != "owens04")
{
header("WWW-Authenticate: Basic realm=\"Password Required\"");
header("HTTP/1.1 401 Unauthorized");
print ("You must provide the proper credentials!"); exit;
}
?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><title>http://faculty.winthrop.edu/wangx/teaching/CSCI241/topics.htm</title><link rel="stylesheet" type="text/css" href="Topics_files/viewsource.css"></head><body id="viewsource" style="-moz-tab-size: 4"><pre id="line1"><span></span></pre></body></html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>CSCI 241.01 Topics</title>
</head>
<body bgcolor="#99CCFF">
<div align="center"> 
  <h2>CSCI 241.01<br />
	Server-Side Programming for the World Wide Web<br />
	Fall, 2012</h2>
  <table width="100%" border-style="ridge" border="1" bgcolor="#EEEEEE">
    <tr>
      <td align="center"><b>
    <a href="../cindex.htm">Home</a> &nbsp; <a href="syllabus.htm">Syllabus</a> &nbsp; <a href="schedule.htm">Schedule</a> &nbsp; <font color="#FF0000">Topics</font> &nbsp; <a href="assignments.htm">Assignments</a> &nbsp; <a href="resources.htm">Resources</a> 
    </b></td>
    </tr>
  </table>
</div>
<p align="left"><b><u>Topics:</u></b></p>


<ol>
    <li>Fundamentals of the Web</li>
	<li><a href="Layout-241.pdf">Website Layout Control</a></li>
	<li><a href="HTTP-241.pdf">HTTP Requests and Responses, and Web Servers</a></li>
	<li><a href="Form-241.pdf">XHTML Forms and Passing Information</a></li>
	<li><a href="PHP01-intro-241.pdf">PHP Introduction</a></li>
	<li><a href="PHP02-basics-241.pdf">PHP Basics</a>&nbsp;</li>
	<li><a href="PHP03-functions-241.pdf">Reusing Code and Functions</a> </li>
	<li><a href="PHP04-arrays-241.pdf">PHP Arrays</a>&nbsp; </li>
	<li><a href="PHP05-strings-241.pdf">PHP Strings</a></li>
	<li><a href="PHP06-database-241.pdf">Database, MySQL and SQL</a></li>
	<li><a href="PHP07-dbquerying-241.pdf">Querying MySQL in PHP</a></li>
	<li><a href="PHP08-dbwriting-241.pdf">Writing to MySQL in PHP</a></li>
	<li><a href="PHP09-errors-241.pdf">Handling Errors</a></li>
	<li><a href="PHP10-validate-241.pdf">Validating User Input</a></li>
	<li><a href="PHP11-sessions-241.pdf">Sessions</a></li>
	<li><a href="PHP12-security-241.pdf">Security</a></li>
	<li><a href="PHP13-onlinesystem-241.pdf">Building an Online System</a> </li>
	<li>The Shopping Cart </li>
	<li>Sending Emails </li>
	<li>Ajax and Remote Scripting</li>
</ol>
<hr />
<div align="left"><i>Xusheng Wang, November 12, 2012</i></div>
</body>
</html>

