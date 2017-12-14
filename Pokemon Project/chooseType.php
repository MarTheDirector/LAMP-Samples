<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once ("includes/header.php");
	//Output types as image that links to only Pokemon of that type
	?>
	<h5 class="chooseType">Choose A Type:</h5>
	<table>
		<tr>
			<td><a href="type.php?type=Bug"><img src="imagesType/Bug.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Dark"><img src="imagesType/Dark.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Dragon"><img src="imagesType/Dragon.png" width=65.294px height=25px></a></td>
		</tr>
		<tr>
			<td><a href="type.php?type=Electric"><img src="imagesType/Electric.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Fairy"><img src="imagesType/Fairy.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Fighting"><img src="imagesType/Fighting.png" width=65.294px height=25px></a></td>
		</tr>
		<tr>
			<td><a href="type.php?type=Fire"><img src="imagesType/Fire.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Flying"><img src="imagesType/Flying.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Ghost"><img src="imagesType/Ghost.png" width=65.294px height=25px></a></td>
		</tr>
		<tr>
			<td><a href="type.php?type=Grass"><img src="imagesType/Grass.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Ground"><img src="imagesType/Ground.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Ice"><img src="imagesType/Ice.png" width=65.294px height=25px></a></td>
		</tr>	
		<tr>
			<td><a href="type.php?type=Normal"><img src="imagesType/Normal.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Poison"><img src="imagesType/Poison.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Psychic"><img src="imagesType/Psychic.png" width=65.294px height=25px></a></td>
		</tr>	
		<tr>
			<td><a href="type.php?type=Rock"><img src="imagesType/Rock.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Steel"><img src="imagesType/Steel.png" width=65.294px height=25px></a></td>
			<td><a href="type.php?type=Water"><img src="imagesType/Water.png" width=65.294px height=25px></a></td>
		</tr>								
	</table>
	<?php
	require_once ("includes/footer.php");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (isset($_POST["deletePokemon"])) //If user clicked on [x] button to delete a pokemon (found in header.php).
	{
		session_start();	//Then start the session
		$key = array_search($_POST["deletePokemon"], $_SESSION["pokemon"]);	//Find the key stored in the hidden input and find it in the session
		unset($_SESSION["pokemon"][$key]);	//Unset the pokemon based on the key for the session
		header("Location: chooseType.php");	//Redirect back to chooseType.php
	}
}
else 
{
	exit("unsupported");
}