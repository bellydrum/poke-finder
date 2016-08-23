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
		
		if($generation == '1')
		{
			$start = 1;
			$end = 151;
		}
		else if($generation == '2')
		{
			$start = 152;
			$end = 251;
		}
		else if($generation == '3')
		{
			$start = 252;
			$end = 386;
		}
		else if($generation == '4')
		{
			$start = 387;
			$end = 493;
		}
		else if($generation == '5')
		{
			$start = 494;
			$end = 649;
		}
		else if($generation == '6')
		{
			$start = 650;
			$end = 721;
		}
		else // add gen 7 when alola dex is complete
		{
			$start = "";
			$end = "";
		}

		return array($start, $end);
	}

	// creates SQL statements from user input
	function generateStatement($caughtStatus, $type, $genStart, $genEnd)
	{
		// initialize statement to an empty string
		$statement = "";

		// if user input exists, create beginning of statement
		if(($caughtStatus == "" && $type == "" && $genStart == "" && $genEnd == "") == false)
		{
			$statement = "WHERE ";

			// if user input exists, add to the statement
			if($caughtStatus != "")
				$statement += "caughtStatus = '{$caughtStatus}'";
			if($type != "")
				$statement += "type = '{$type}'";
			if($genStart != "" && $genEnd != "")
				$statement += "nationalDex >= {$genStart} AND nationalDex <= {$genEnd}";
		}

		// return the result; empty string if input is empty
		return $statement;
	}


?>
