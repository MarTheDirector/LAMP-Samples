<?php require_once "header.php"

?>
<div id="table3">
<h2>Search:</h2><br/><br/>
<form name="form1" id="form1" method="get" action="searchlist.php">
            <input type="text" name="searchstr" size="90" />
            <input type="submit" value="Search" /> <br />
            <input type="radio" name="searchtype" value="title" checked="checked"/>Title
		    <input type="radio" name="searchtype" value="authors"/>Author
		    <input type="radio" name="searchtype" value="isbn"/>ISBN
		    <input type="radio" name="searchtype" value="keyword"/>Keyword
            <br />
          </form


></div><?php
 require_once "footer.php";

?>