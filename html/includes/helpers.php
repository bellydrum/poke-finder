<?php

	require_once('config.php');


	// renders html template
	function render($template, $data=[])
	{
		$path = __DIR__ . '/../views/' . $template . '.php';
		if(file_exists($path))
		{
			extract($data);
			require($path);
		}
	}

	
	// determines National Dex range of generation
	function findRange($generation)
	{
		$start = $end = 0;
		
		switch($generation)
		{
			case 1:
				$start = 1;
				$end = 151;
				break;
			case 2:
				$start = 152;
				$end = 251;
				break;
			case 3:
				$start = 252;
				$end = 386;
				break;
			case 4:
				$start = 387;
				$end = 493;
				break;
			case 5:
				$start = 494;
				$end = 649;
				break;
			case 6:
				$start = 650;
				$end = 721;
				break;
			default:
				$start = "";
				$end = "";
		}

		return array($start, $end);
	}


	// creates sql statement from name text field form
	function generateNameStatement($name)
	{
		// initialize statement to an empty string
		$statement = "";

		if($name)
		{
			$statement = "SELECT * FROM pokemon WHERE name = '{$name}';";
		}
		else
		{
			$statement = "SELECT * FROM pokemon ORDER BY nationalDex;";
		}

		return $statement;
	}


	// creates SQL statements from user input
	function generateStatement($caughtStatus, $type, $type2, $genStart, $genEnd)
	{
		// initialize statement to an empty string
		$statement = "";


		// if any user input exists, create beginning of statement
		if(!($caughtStatus == "" && $type == "" && $type2 == "" && $genStart == "" && $genEnd == ""))
		{
			// start statement string
			$statement = "WHERE ";
			
			// create array for pieces of the statement string
			// will iterate through array and append to statement string at the end
			$statementArray = array();

			// if user input exists, add to the statement array
			if($caughtStatus != "")
			{
				$caughtStatusStatement = "caughtStatus = '{$caughtStatus}'";
				array_push($statementArray, $caughtStatusStatement);
			}
			if($type != "")
			{
				$typeStatement = "(type = '{$type}' OR type2 = '{$type}')";
				array_push($statementArray, $typeStatement);
			}
			if($type2 != "")
			{
				$type2Statement = "(type = '{$type2}' OR type2 = '{$type2}')";
				array_push($statementArray, $type2Statement);
			}
			if($genStart != "" && $genEnd != "")
			{
				$genStartStatement = "nationalDex >= {$genStart} AND nationalDex <= {$genEnd}";
				array_push($statementArray, $genStartStatement);
			}

			// now take each piece of the statement and append to the statement string
			
			for($i = 0; $i < count($statementArray); $i++)
			{
				if($i != (count($statementArray) - 1))
					$statement = $statement . $statementArray[$i] . " AND ";
				else
					$statement = $statement . $statementArray[$i];
			}
		}

		// return the resulting statement; empty string if input is empty
		return $statement;
	}

	// toggles pokemon's caughtStatus between caught and uncaught
	function updateCaughtStatus($pokemonId)
	{
		$newCaughtStatus;
		$row = $db->query("SELECT caughtStatus WHERE nationalDex = {$pokemonId};");

		if($row['caughtStatus'] == 'uncaught')
			$newCaughtStatus = 'caught';
		else
			$newCaughtStatus = 'uncaught';

		return $newCaughtStatus;
	}

?>
