<?php
session_start(); //Start the session
if(!isset($_SESSION["pokemon"])) //If $_SESSION["pokemon"] is not set
{
$_SESSION["pokemon"] = array();	//Then go ahead and initilize it to a blank array.
}

require_once ("common.php");
?>
<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="pokemon.css"> <!--Stylesheet for all pages-->
		<title>Pokemon</title>
	</head>
	<body>
		<header>
			<img class="img_title" src="images/pokemon_starting_6_title.png" height="160.5" width="350">	<!--Title-->
			
			<ul class="nav_bar">	<!--Navigation-->
				<li><a href="index.php">Home</a></li>
				<li><a href="pokemon.php">Choose Your Pokemon</a></li>
				<li><a href="chooseType.php">Sort By Types</a></li>
			</ul>
			
			<ul class="nav_bar">	<!--Pictures for starting 6-->
			<?php
			foreach ($_SESSION["pokemon"] as $key => $pokemon) //For each of the pokemon in the session
			{
				?>
				<li>
					<img src="<?php echo pokemonImage($pokemon); ?>" width=96px height=96px> <!--Output an image of that pokemon-->
					<form method="POST">	<!--Create a form that goes to post-->
						<input type="hidden" name="deletePokemon" value="<?php echo $pokemon; ?>"><!--Which contains a hidden input set to a value of the pokemon's key-->
						<button type="submit">X</button>	<!--And a submit button with an X to remove the pokemon from the session-->
					</form>
				</li>
				<?php
			}
			if(count($_SESSION["pokemon"]) < 6)	//If there are less than 6 pokemon in the session
			{
				for ($count=count($_SESSION["pokemon"]); $count < 6 ; $count++) { //Then loop through starting at the number of pokemon in the array and ending at 6
					?>
					<img src="imagesPokemon/0.png" width=96px height=96px> <!--And output the question mark image (imagesPokemon/0.png)-->
					<?php
				}
			}			
			?>
			</ul>
		</header>