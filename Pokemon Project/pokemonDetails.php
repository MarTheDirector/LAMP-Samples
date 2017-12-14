<?php
function getTypeDetails ($type)	//Holds array that contains strengths/resistances for each type. Passing a type will retreive the strengths/resistances associated with that type.
{
//Declare an array that holds all the strengths/resistances for each type in a 2D associative array.
//Each type has a key of that type's name.
//Inside each type holds another associative array	with the strenths/resistances for that type.
	//i.e.: to find the strength/resistance of a water attack against a fire type pokemon call--> $typeDetails["Fire"]["Water"]
//***NOTE***: I got very close to reading this array from a file, but ended up having to hard code it. I included the file just incase you wanted to see what I was dealing with (pokemon_types.txt).
$typesDetails = array(
'Normal' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'1' ,'Rock'=>'0.5' ,
				'Bug'=>'1' ,'Ghost'=>'0' ,'Steel'=>'0.5' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Fighting' => array('Normal' =>'2' ,'Fighting' =>'1' ,'Flying' =>'0.5' ,'Poison' =>'0.5' ,'Ground'=>'1' ,'Rock'=>'2' ,
				'Bug'=>'0.5' ,'Ghost'=>'0' ,'Steel'=>'2' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'0.5' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Flying' => array('Normal' =>'1' ,'Fighting' =>'2' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'1' ,'Rock'=>'0.5' ,
				'Bug'=>'2' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'2' ,
				'Electric'=>'0.5' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Poison' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'1' ,'Poison' =>'0.5' ,'Ground'=>'0.5' ,'Rock'=>'0.5' ,
				'Bug'=>'1' ,'Ghost'=>'0.5' ,'Steel'=>'0' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'2' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'2' ),
'Ground' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'0' ,'Poison' =>'2' ,'Ground'=>'1' ,'Rock'=>'2' ,
				'Bug'=>'0.5' ,'Ghost'=>'1' ,'Steel'=>'2' ,'Fire'=>'2' ,'Water'=>'1' ,'Grass'=>'0.5' ,
				'Electric'=>'2' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Rock' => array('Normal' =>'1' ,'Fighting' =>'0.5' ,'Flying' =>'2' ,'Poison' =>'1' ,'Ground'=>'0.5' ,'Rock'=>'1' ,
				'Bug'=>'2' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'2' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'2' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Bug' => array('Normal' =>'1' ,'Fighting' =>'0.5' ,'Flying' =>'0.5' ,'Poison' =>'0.5' ,'Ground'=>'1' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'0.5' ,'Steel'=>'0.5' ,'Fire'=>'0.5' ,'Water'=>'1' ,'Grass'=>'2' ,
				'Electric'=>'1' ,'Psychic'=>'2' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'2' ,'Fairy'=>'0.5' ),
'Ghost' => array('Normal' =>'0' ,'Fighting' =>'1' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'1' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'2' ,'Steel'=>'1' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'2' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'0.5' ,'Fairy'=>'1' ),
'Steel' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'1' ,'Rock'=>'2' ,
				'Bug'=>'1' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'0.5' ,'Water'=>'0.5' ,'Grass'=>'1' ,
				'Electric'=>'0.5' ,'Psychic'=>'1' ,'Ice'=>'2' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'2' ),
'Fire' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'1' ,'Rock'=>'0.5' ,
				'Bug'=>'2' ,'Ghost'=>'1' ,'Steel'=>'2' ,'Fire'=>'0.5' ,'Water'=>'0.5' ,'Grass'=>'2' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'2' ,'Dragon'=>'0.5' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Water' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'2' ,'Rock'=>'2' ,
				'Bug'=>'1' ,'Ghost'=>'1' ,'Steel'=>'1' ,'Fire'=>'2' ,'Water'=>'0.5' ,'Grass'=>'0.5' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'0.5' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Grass' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'0.5' ,'Poison' =>'0.5' ,'Ground'=>'2' ,'Rock'=>'2' ,
				'Bug'=>'0.5' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'0.5' ,'Water'=>'2' ,'Grass'=>'0.5' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'0.5' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Electric' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'2' ,'Poison' =>'1' ,'Ground'=>'0' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'1' ,'Steel'=>'1' ,'Fire'=>'1' ,'Water'=>'2' ,'Grass'=>'0.5' ,
				'Electric'=>'0.5' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'0.5' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Psychic' => array('Normal' =>'1' ,'Fighting' =>'2' ,'Flying' =>'1' ,'Poison' =>'2' ,'Ground'=>'1' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'0.5' ,'Dragon'=>'1' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Ice' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'2' ,'Poison' =>'1' ,'Ground'=>'2' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'0.5' ,'Water'=>'0.5' ,'Grass'=>'2' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'0.5' ,'Dragon'=>'2' ,'Dark'=>'1' ,'Fairy'=>'1' ),
'Dragon' => array('Normal' =>'1' ,'Fighting' =>'1' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'1' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'2' ,'Dark'=>'1' ,'Fairy'=>'0' ),
'Dark' => array('Normal' =>'1' ,'Fighting' =>'0.5' ,'Flying' =>'1' ,'Poison' =>'1' ,'Ground'=>'1' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'2' ,'Steel'=>'1' ,'Fire'=>'1' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'2' ,'Ice'=>'1' ,'Dragon'=>'1' ,'Dark'=>'0.5' ,'Fairy'=>'0.5' ),
'Fairy' => array('Normal' =>'1' ,'Fighting' =>'2' ,'Flying' =>'1' ,'Poison' =>'0.5' ,'Ground'=>'1' ,'Rock'=>'1' ,
				'Bug'=>'1' ,'Ghost'=>'1' ,'Steel'=>'0.5' ,'Fire'=>'0.5' ,'Water'=>'1' ,'Grass'=>'1' ,
				'Electric'=>'1' ,'Psychic'=>'1' ,'Ice'=>'1' ,'Dragon'=>'2' ,'Dark'=>'2' ,'Fairy'=>'1' )
);

return $type = $typesDetails[$type];	//Return the type's strengths and resistances based on the $type passed.
}



function outputEffects($effectsArray, $effectInfo)	//Outputs a fieldset for each effect (no effect, resistant, supereffective) and text to be supplied alongside effect.
{
	foreach ($effectsArray as $key => $effect) 
	{
		if(!empty($effect))
		{
			$type = typeImage($key);
			?>	
			<fieldset>	
			<legend><?php echo "<img src='$type' width=65.294px height=25px>" . " " . $effectInfo ;?>:</legend>
			<ul>	
			<?php	
			foreach ($effect as $keyInfo => $info) 
			{
				$type = typeImage($info);
				echo "<li>" . "<img src='$type' width=65.294px height=25px>" . "</li>";
			}
			?>
			</ul>
			</fieldset>
			<?php
		}
	}
}

if($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once ("includes/header.php");
	require_once ("includes/common.php");
	
	$pokemons = readPokemon("pokemon.txt");	//Read in pokemon from pokemon.txt into pokemons array
	
	if(isset($pokemons[$_GET["pokemon"]]))	//If the query string pokemon is set, then output the pokemon's strengths and resistances to various types.
	{
		$pokemonImage = pokemonImage($_GET["pokemon"]);		//Get the image for the supplied pokemon based on the query string.
		
		$typeDetails[$pokemons[$_GET["pokemon"]][2]] = getTypeDetails($pokemons[$_GET["pokemon"]][2]);	//Get the strengths/resistances for the first type (position [2]) from the function getTypeDetails
		if(!empty($pokemons[$_GET["pokemon"]][3]))	//Since not all pokemon have two types, check if the second type (element [3]) is empty
		{
			$typeDetails[$pokemons[$_GET["pokemon"]][3]] = getTypeDetails($pokemons[$_GET["pokemon"]][3]);	//If it isn't empty, then do the same thing as for the first type
		}
		?> 
		<div class="detailsContainer">	<!--Create a container to hold all the details-->
		<h1 class="pokemon_details_title"><?php echo $pokemons[$_GET["pokemon"]][1]; ?></h1> <!--Output the name of the pokemon and a picture of it.-->
		<img class="pokemon_details" src=<?php echo $pokemonImage ?> width=96px height=96px >
		<?php
		foreach ($typeDetails as $key => $type) //Output the picture of the type(s) associated with that pokemon
		{
			?>
			<img class="pokemon_details" src=<?php echo typeImage($key) ;?> width=65.294px height=25px>
			<?php
		}
		//Blank arrays for no effect, resistant, and super effective. Will hold the specified pokemon's type(s) and become a 2D array shortly.
		$noEffect = array();	//For _____ type attacks that have no effect on _____ types.
		$resistant = array();	//For _____ type attacks that are resistant to _____ types.
		$superEffective = array();	//For _____ type attacks that are super effective on _____ types.
		
		foreach ($typeDetails as $key => $type) //For each of the type(s) (which will either be 1 or 2 types)
		{
			//Loop through the type(s)
			$noEffect[$key] = array();	//Create a blank associative array for each type(s) and for no effect, resistant, and super effective
			$resistant[$key] = array();
			$superEffective[$key] = array();

			foreach ($type as $keyInfo => $info) 	//For each strength/resistance of that specified type...
			{
				if($info == "0")	//If attacking type ($key) is equal to 0, then attacking type has no effect on defending type ($keyInfo).
				{
					$noEffect[$key][] = $keyInfo;	//Therefore add it into the noEffect array. Make the defending type the associative key.
				}
				elseif ($info == "0.5") //If attacking type ($key) is equal to 0.5, then defending type ($keyInfo) is resistant.
				{
					$resistant[$key][] = $keyInfo;	//Therefore add it into the resistant array. Make the defending type the associative key.
				}
				elseif ($info == "2") //If the attacking type ($key) is 2, then attacking type is super effective against defending type ($keyinfo)
				{
					$superEffective[$key][] = $keyInfo;	//Therefore add it into the super effective array. Make the defending type the associative key.
				}	
			}
			
		}
		
		//Output the fieldsets for the type(s) associated to that pokemon.
		outputEffects($noEffect, "attacks have no effect on");	//Fieldset for defending types that aren't effected by attacking type
		outputEffects($resistant, "attacks are resistant to");	//Fieldset for defending types that are resistant to attacking type.
		outputEffects($superEffective, "attacks are super effective against");	//Fieldset for defending types that are super effected against attacking type.
		?>
		</div>	<!--Close container that holds the pokemon's details-->
		<?php
	}
	else //Otherwise, the GET query pokemon is not set. 
	{
		header("Location: pokemon.php");	//So redirect the user back to pokemon.php
	}
	
	require_once ("includes/footer.php");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (isset($_POST["deletePokemon"])) 	//If the user deleted a pokemon from the session
	{
		session_start();	//Then start the session
		$key = array_search($_POST["deletePokemon"], $_SESSION["pokemon"]);	//Find the key based on the hidden input's index value in the session
		unset($_SESSION["pokemon"][$key]);	//And unset the pokemon from the session based on the key.
		header("Location: pokemonDetails.php" . "?pokemon=" .  $_GET["pokemon"]);	//Redirect the user back to GET
	}
}
else
{
	//unsupported
}
