<?php

if($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once ("includes/header.php");
	require_once ("includes/common.php");
	
	$pokemons = readPokemon("pokemon.txt");	//Read pokemon from pokemon.txt

	//NOTE: Paginator taken with permission from in class example and modified for use.
	$limit = 50;	//Paginator: limot of 50 items per page.
	$page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;	//Paginator: if page query is set, then case it to an integer. Otherwise if it isn't set, then imply that it's 1.
	$total = count($pokemons);	//Paginator: set to total number of pokemon in in array.
	$totalPages = ceil($total/$limit);	//Paginator: divid total number of pokemon by the limit and take the ceiling to find the total number of pages.
	
	$pokemonCurrentPage = array();	//Create a blank array to store the pokemon to be displayed on that page.
	for($ct = ($page -1 ) * $limit ; $ct < $page * $limit  && $ct >= 0 && $ct < $total; $ct++)
	{//Start at current pages value -1 * limit and keep going while ct is less than the limit and less than total.
		$pokemonCurrentPage[] = $pokemons[$ct];	//Add current pokemon based on ct to array pokemonCurrentPage
		
	}
	
	outputPokemons($pokemonCurrentPage);	//Call function outputPokemon to output current pokemon to page (in common.php)
	
	echo "<br><br>";
	
	paginator($page, $totalPages);	//Pass number of pages and total number of pages to the paginator function (in common.php)
	
	require_once ("includes/footer.php");
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if(isset($_POST["addPokemon"]))	//If the user added a pokemon 
	{
		session_start(); //Then start the session
		$_SESSION["pokemon"][] = $_POST["addPokemon"]; //And add the specified pokemon from the index set in the hidden input into the session
		header("Location: pokemon.php" . "?" . $_SERVER["QUERY_STRING"]);	//Redirect them back to GET.
	}
	elseif (isset($_POST["deletePokemon"])) 	//If the user deletes a pokemon
	{
		session_start();	//Start the session
		$key = array_search($_POST["deletePokemon"], $_SESSION["pokemon"]);	//Find the key to delete from the hidden input inside of session.
		unset($_SESSION["pokemon"][$key]);	//Unset that pokemon based on the key found.
		header("Location: pokemon.php" . "?" . $_SERVER["QUERY_STRING"]);	//Redirect the user back to GET.
	}

}
else 
{
	//unsupported
}
