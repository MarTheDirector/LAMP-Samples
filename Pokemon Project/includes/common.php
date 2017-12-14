<?php

function readPokemon ($filename)	//Reads in file of pokemons. Title and body deliminated by pipe. Each pokemon deliminated by line feed.
{
	$fileResource = fopen($filename, "r");	//Open file in read mode and set it equal to $fileResource.
	
	if(!is_resource($fileResource))	//If unable to read file. Output error message to user with link to my email address.
	{
		exit("Unable to read pokemons. Please contact the administrator at: {<a href='mailto:smitha110@mailbox.winthrop.com?Subject=Read%20pokemon%20Error'>smitha110@mailbox.winthrop.edu</a>}.");
	}
		
	$pokemons = array();	//Declare a 1D empty array to hold pokemons. Each element will be an array containing name and types, which will make it a 2D array after while loop.
	
	$pokemonIndex = 0;	//For the index number that is associated with each Pokemon. 

	while($line = fgets($fileResource))	//Loop until there isn't anymore lines to read
	{
		$line = $pokemonIndex . "|" . $line;	//Add on the Pokemon's index number and concat with the current line
		$line = trim($line);	//Trim off whitespace (2nd type, empty or not, ends up containing a space upon reading in the line)
		$pokemon = explode("|", $line);	//Explode into an array that represents a single pokemon
		$pokemons[] = $pokemon;				//Append $pokemon array onto $pokemons array
		unset($pokemon);					//Unset element in $pokemon array to ensure only 1 element is in $pokemon at a time.
		$pokemonIndex++;		
	}
	
	fclose($fileResource);	//Close file to ensure integrity.
	return $pokemons;	//Return 2D array $pokemons.
}

function typeImage ($type)	//Function to get the type's image
{
	$filePath = "imagesType/";	//Path to images for types
	
	$type = $filePath . $type . ".png";	//Concat the path, type, and .png
	
	return $type;	//Return the complete path to output the type picture
}

function pokemonImage ($index)	//Function to get the pokemon's image
{
	$filePath = "imagesPokemon/";	//Pathto images for pokemon
	$index = $index + 1;	//Since array starts at 0, add 1 (since Bulbasaur is the 1st pokemon, it is #1)
	
	$pokemonImage = $filePath . $index . ".png";	//Concat path, index to pokemon image, and .png
	
	return $pokemonImage;	//Return complete path to output the type picture
}

function outputPokemons ($pokemons)	//Function to output a table of pokemon
{
	?>
	<table class="pokemonHover"> <!--Table start with class atribute "pokemonHover" for hover color-->
		<?php
		foreach ($pokemons as $pokemonKey => $pokemon) 	//For each of the pokemons as pokemon
		{
			echo "<tr>";	//Output a row
			foreach ($pokemon as $key => $nameAndType) //And iterate through that Pokemon's type and name attributes
			{
				if($key == 2 || $key ==3)	//If the $key is 2 or 3, then it's a type
				{
					if(empty($nameAndType))	//If the type is empty...
					{
						echo "<td></td>";//Then the Pokemon doesn't have a second type. Output a blank cell
					}
					else 	//Else, there is a type
					{
						$type = typeImage($nameAndType);	//So output the type's picture in a cell, but first get the type image's path.
						?>
							<td><img src="<?php echo $type; ?>" alt="<?php echo $nameAndType; ?>" width=65.294px height=25px></td>
						<?php
					}
				}
				else //Else, the Pokemon's index ([0]) name ([1]).
				{
					 if($key == 0)	//If it is the Pokemon's index number
					 {
					 	$index = 1 + $nameAndType;	//Then add 1 
					 	echo "<td>" . "#$index" . "</td>";	//Output pound sign and index number
					 	$pokemonImage = pokemonImage($nameAndType);	//Get the pokemon's image path (based on the index number) from pokemonImage
						?>
						<td><img src="<?php echo $pokemonImage; ?>"  width=96px height=96px></td> <!--And output a cell to hold the Pokemon's image.-->
						<?php
					 }
					 else //Otherwise, output the Pokemon's name
					 {
						 //Name's cell will contain a link to the Pokemon's strengths/resistances (pokemonDetails) with a query of pokemon with the index number.
						echo "<td>" . "<a href='pokemonDetails.php?pokemon={$pokemon[0]}'> ".$nameAndType. "</a>" . "</td>";
					 }
				}
				
				
			}
			if(count($_SESSION["pokemon"]) < 6)	//The last cell is for the add button, which will only be outputted if there are less than 6 Pokemon in the session.
			{
			?>
			<td>
			<form method="POST"> <!--Form to direct to POST-->
				<input type="hidden" name="addPokemon" value="<?php echo $pokemon[0]; ?>"> <!--With a hidden input of that Pokemon's index number-->
				<button name="submit" type="submit">+</button>	<!--And a submit button of + to add the Pokemon to the session-->
			</form>
			</td>
			<?php
			echo "</tr>";
			}
		} //End of foreach
		?>
	</table>	<!--End of table-->
	<?php
	return;
}

function paginator($page, $totalPages)	//Function for pagination. Was hoping to get it to work dynamically based off the script name and query string.
{
	?>
	<div class="paginatorContainer"> <!--Container to hold the paginator-->
	<?php
	if($page -1 <= 0) //If page -1 is less than or equal to 0
	{
		echo "< Prev ";	//Then output the Previous text without a link
	}
	else {	//Otherwise, output the previous button with the link
		$scriptName = $_SERVER["SCRIPT_NAME"];		
		echo "<a href='$scriptName" . "?page=" .  ($page - 1)  .  "'>< Prev</a> ";
	}
	for($ct = max(1, $page - 3); $ct <= $page + 3  && $ct <= min($totalPages,  $page + 3 ) ; $ct++)
	{	//Output 3 pages before and after the current page.
		if($page == $ct)	//Only output the text of the current page if on the current page.
		{
			echo " [$ct] ";
		}
		else 	//Otherwise, output a link to the page before/after the current page.
		{	
			$scriptName = $_SERVER["SCRIPT_NAME"];
			echo " <a href='$scriptName" . "?page=" .  ($ct) .  "'>$ct</a> ";
		}
	}
	if($page  + 1 > $totalPages)	//If pages + 1 is greater than the total number of pages
	{
		echo "Next >";	//Then output the text Next without a link
	}
	else {	//Otherwise output the link Next with a query string to go to the next page of items.
		$scriptName = $_SERVER["SCRIPT_NAME"];
		echo "<a href='$scriptName" . "?page=" .  ($page + 1)  .  "'>Next ></a>";
	}
	?>
	</div> <!--Closing div for paginator's container-->
	<?php
	return;
}
