<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once ("includes/header.php");
	require_once ("includes/common.php");
	
	if(isset($_GET["type"]))	//If the type query is set, then output the pokemon of that type
	{
		$pokemons = readPokemon("pokemon.txt");	//Read in pokemon into pokemons array from pokemon.txt
		
		$pokemonsType = array();	//create a blank array to store pokemon of the type specified by the query string 
		foreach ($pokemons as $pokemonKey => $pokemon) //For each of the pokemon in pokemons...
		{
			foreach ($pokemon as $nameAndType) //Iterate through each element of that pokemon and...
			{
				if($_GET["type"] == $nameAndType)	//If the type matches the query string, then add it to the pokemonsType array.
				{
					$pokemonsType[] = $pokemon;
				}
			}
		}
		
		if(empty($pokemonsType))	//If no pokemon are found of that type, then query was modified. Redirect them to chooseType.php to choose a type.
		{
			header("Location: chooseType.php");
		}
			
		outputPokemons($pokemonsType);	//Output the pokemon of the specified type (common.php)
	}
	else //Otherwise query string is not there. No type to display. Redirect to chooseType.php.
	{
		header("Location: chooseType.php");
	}
	
	require_once ("includes/footer.php");
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if(isset($_POST["addPokemon"]))	//If the user added a pokemon...
	{
		session_start();	//Then start the session
		$_SESSION["pokemon"][] = $_POST["addPokemon"];	//Add the pokemon specified by the index set in the hidden input into the session
		header("Location: type.php" . "?type=" . $_GET["type"]);	//Redirect the user back to GET.
	}
	elseif (isset($_POST["deletePokemon"])) //If the user deletes a pokemon...
	{
		session_start();	//Then start the session
		$key = array_search($_POST["deletePokemon"], $_SESSION["pokemon"]);	//Find the key of the pokemon to unset from the index set in the hidden input inside of the session.
		unset($_SESSION["pokemon"][$key]);	//Unset the pokemon in the session supplied by $key.
		header("Location: type.php" . "?type=" . $_GET["type"]);	//Redirect the user back to GET.
	}	
}
else 
{
	exit("unsupported");
}
