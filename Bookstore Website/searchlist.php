<?php
 require_once "header3.php";

?>

<?php
require "apps.php";

if (!isset($_GET["searchstr"]))
{	print "<div class=\"searchmsg\">No Search string provided <a href=\"search.php\">Try Again?</a></div>"; exit; }
$searchstr = $_GET["searchstr"];

if (!isset($_GET["searchtype"]) || empty($_GET["searchtype"]))
{	print "<div class=\"searchmsg\">No Search string provided <a href=\"search.php\">Try Again?</a></div>"; exit; }
$searchtype = $_GET["searchtype"];

if(empty($searchstr))
{
	print "<div class=\"searchmsg\">You can't leave the search field blank. <a href=\"search.php\">Try Again?</a></div>"; exit; 
}


if (!($connection = @ mysql_connect($hostname, $dbusername, $dbpassword)))
print "<div class=\"searchmsg\">Could not connect to the database server.</div>";
elseif (!(@ mysql_select_db($databasename, $connection)))
	showerror();
	else
	{
		$query = "SELECT title, authors, publisher, publishdate, ISBN, ISBN13, pages, price, description FROM books";
		
		
			if (!empty ($searchstr)) 
			{
				if ($searchtype=="title")
				$query .= " WHERE title LIKE '%{$searchstr}%'";
				elseif ($searchtype == "isbn")
				$query .= " WHERE ISBN LIKE '%{$searchstr}%' OR ISBN13 LIKE '%{$searchstr}%'";	
				elseif ($searchtype == "authors")
				$query .= " WHERE authors LIKE '%{$searchstr}%'";
				elseif ($searchtype == "keyword")
				$query .= " WHERE title LIKE '%{$searchstr}%' OR authors LIKE '%{$searchstr}%' OR ISBN LIKE '%{$searchstr}%' OR ISBN13 LIKE '%{$searchstr}%'";
			}
			$query .= " ORDER BY ISBN13";
			
			
			if (!($result = @ mysql_query($query, $connection)))
			showerror();
		else
		{
			
			$num = mysql_num_rows($result);
			if ($num == 0)
			print "<div class=\"searchmsg\">Sorry, your Search did not match any of our books. <a href=\"search.php\">Try Again?</a></div>";
			else 
			{
				$one = " are";
				if ($num > 1) $one = "s are";
				print "<div class=\"searchmsg\"><b>{$num} book{$one} found relating to </b>\"<b>{$searchstr}</b>\"</div><br/><br/>";
				
				// config-------------------------------------
				$host = "mysql16.000webhost.com"; //database host
				$user = "a4277949_freeman"; // database user name
				$pass = "ridehardspr2"; // database password
				$db = "a4277949_book"; // database name
				
				$filename = "searchlist.php"; // name of this file
				$option = array (5, 10);
				$default = 9; // default number of records per page
				$action = $_SERVER['PHP_SELF']; // if this doesn't work, enter the filename
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
				echo "<div id\"searchdiv\">";
				while ($row = mysql_fetch_object($sql)) {
				// ----------------------Booklist print !!!Important part!!!-----------------------------
				echo "<div id=\"bookpannel\"><h1>$count.<a href=\"select.php?isbn={$row->ISBN13}\">{$row->title}</h1></a><img src=\"bookimages/{$row->ISBN}.jpg\" 
				align=\"left\" width=\"182\" height=\"212\" />By: {$row->authors}<br /><h5>\${$row->price}</h5></div>"; 
				
				$count += 1;
				if ($count==6)
				{
				echo "<br/><br/>";	
				}
				if ($count==15)
				{
				echo "<br/><br/>";	
				}
				}
				echo "<div id=\"pagepannel\"><br /><br /><br /><br /><br /><br />\r\n";
				if ($off <> 1) {
				$prev = $off - 1;
				echo "<a href=\"$filename?searchstr=$searchstr&searchtype=$searchtype&offset=$prev&amp;go=$go\"><button type=\"button\" > < prev</button></a> \r\n";
				}
				for ($i = 1; $i <= $off_pag; $i ++) {
				if ($i == $off) {
				echo "<button type=\"button\" id=\"onpage\">$i</button> \r\n";
				} else {
				echo "<a href=\"$filename?searchstr=$searchstr&searchtype=$searchtype&offset=$i&amp;go=$go\"><button type=\"button\" >$i</button></a> \r\n";
				}
				}
				if ($off < $off_pag) {
				$next = $off + 1;
				echo "<a href=\"$filename?searchstr=$searchstr&searchtype=$searchtype&offset=$next&amp;go=$go\"><button type=\"button\" >next ></button></a> \r\n";
				}
				
				echo "<br /><br />\r\n";
				echo "Page $off of $off_pag<br />\r\n</div>";
				echo "</div>";

			}
		}
		
	}

?>
<?php
 require_once "footer.php";

?>
