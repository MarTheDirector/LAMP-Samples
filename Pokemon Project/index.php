<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once ("includes/header.php");
	//Output information about what the site does.
	?>
	<h1 class="homepage">Choose Your Starting Six</h1>
	<p class="homepage">Click on: &quot;Choose Your Pokemon&quot; to start choosing Pokemon.</p>
	<p class="homepage">You can sort by different types, as well as, click on a Pokemon's<br>
		name to view how effective it is versus various types.
	</p>
	<?php
	require_once ("includes/footer.php");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (isset($_POST["deletePokemon"])) //If user clicked on [x] button to delete a pokemon (found in header.php).
	{
		session_start();	//Then Start the session
		$key = array_search($_POST["deletePokemon"], $_SESSION["pokemon"]); //Find the key of the pokemon to delete supplied from the hidden input
		unset($_SESSION["pokemon"][$key]);	//Unset that pokemon from the session.
		header("Location: index.php");	//Redirect back to the homepage.
	}
}
else
{
	//Unsupported
}
