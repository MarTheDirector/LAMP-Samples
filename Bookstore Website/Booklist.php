<?php
 require_once "header2.php";

?>
<?php
require "apps.php";

	?>
    
    
<?php
/*
PHP Page navagation code thanks to an outline that Ilir Fekaj wrote.
You can contact him at: tebrino@hotmail.com
*/

// config-------------------------------------
$host = "mysql16.000webhost.com"; //database host
$user = "a4277949_freeman"; // database user name
$pass = "ridehardspr2"; // database password
$db = "a4277949_book"; // database name

$filename = "Booklist.php"; // name of this file
$option = array (5, 10);
$default = 9; // default number of records per page
$action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename
$query = "SELECT title, authors, price, ISBN, ISBN13 FROM books ORDER BY title"; // database query
// end config---------------------------------

$opt_cnt = count ($option);

$go = $_GET['go'];

if ($go == "") {
$go = $default;
}
elseif (!in_array ($go, $option)) {
$go = $default;
}
elseif (!is_numeric ($go)) {
$go = $default;
}
$nol = $go;
$limit = "0, $nol";
$count = 1;

/*these commented out lines changes how much books the user wants to see per page. may use it later
-------------------------------------------------------------------------------------------------
echo "<form name=\"form1\" id=\"form1\" method=\"get\" action=\"$action\">\r\n";
echo "<select name=\"go\" id=\"go\">\r\n";

for ($i = 0; $i <= $opt_cnt; $i ++) {
if ($option[$i] == $go) {
echo "<option value=\"".$option[$i]."\" selected=\"selected\">".$option[$i]."</option>\r\n";
} else {
echo "<option value=\"".$option[$i]."\">".$option[$i]."</option>\r\n";
}
}

echo "</select>\r\n";
echo "<input type=\"submit\" name=\"Submit\" id=\"Submit\" value=\"Go\" />\r\n";
echo "</form>\r\n";
------------------------------------------------------------------------------------------------*/

$connection = mysql_connect ($host, $user, $pass) or die ("Unable to connect");
mysql_select_db ($db) or die ("Unable to select database $db");


// control query------------------------------
// this query checks how many records are in the table. In case of conflicting numbers

$off_sql = mysql_query ("$query") or die ("Error in query: $off_sql".mysql_error());
$off_pag = ceil (mysql_num_rows($off_sql) / $nol);
//--------------------------------------------

$off = $_GET['offset'];

if (get_magic_quotes_gpc() == 0) {
$off = addslashes ($off);
}
if (!is_numeric ($off)) {
$off = 1;
}
// this checks if user is trying to put something stupid in query string
if ($off > $off_pag) {
$off = 1;
}

if ($off == "1") {
$limit = "0, $nol";
}
elseif ($off <> "") {
for ($i = 0; $i <= ($off - 1) * $nol; $i ++) {
$limit = "$i, $nol";
$count = $i + 1;
}
}

// Query to extract records from database.
$sql = mysql_query ("$query LIMIT $limit") or die ("Error in query: $sql".mysql_error());

while ($row = mysql_fetch_object($sql)) {
// ----------------------Booklist print !!!Important part!!!-----------------------------
echo "<div id=\"bookpannel\"><h1>$count.<a href=\"select.php?isbn={$row->ISBN13}\">{$row->title}</h1></a><img src=\"bookimages/{$row->ISBN}.jpg\" 
align=\"left\" width=\"182\" height=\"212\" style=\"margin-right:10px\" />By: {$row->authors}<br /><h5>\${$row->price}</h5></div>"; 

$count += 1;
}
echo "<div id=\"pagepannel\"><br /><br /><br /><br /><br /><br />\r\n";
if ($off <> 1) {
$prev = $off - 1;
echo " <a href=\"$filename?offset=$prev&amp;go=$go\"><button type=\"button\" > < prev</button></a>  \r\n";
}
for ($i = 1; $i <= $off_pag; $i ++) {
if ($i == $off) {
echo "<button type=\"button\" id=\"onpage\">$i</button> \r\n";
} else {
echo " <a href=\"$filename?offset=$i&amp;go=$go\"><button type=\"button\" >$i</button></a>  \r\n";
}
}
if ($off < $off_pag) {
$next = $off + 1;
echo " <a href=\"$filename?offset=$next&amp;go=$go\"><button type=\"button\" >next ></button></a> \r\n";
}

echo "<br /><br />\r\n";
echo "Page $off of $off_pag<br />\r\n</div>";
?>

    

    
    

<?php
 require_once "footer.php";

?>
