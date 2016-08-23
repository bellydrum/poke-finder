<?php
	require('../includes/config.php');
	
	// generate base html
	render("header", ["title"=>"Pokemon Finder"]);
	render("pokedex_form");




	// if arriving at page via submit button
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// gather input from $_POST

		/*  CLEAN
		  *   THIS
		   *   SHIT
		    *   UP
		     */

		$caughtStatus = $_POST['caughtStatus'];
		$type = $_POST['type'];
		$generation = findRange($_POST['generation']);
		$genStart = $generation[0];
		$genEnd = $generation[1];



		// use input to create sql statements
		$whereClause = generateStatement($caughtStatus, $type, $genStart, $genEnd);
		$statement = "SELECT * FROM pokemon " . $whereClause . "ORDER BY nationalDex;";
		print($statement);

		foreach($db->query($statement) as $row)
		{
			echo $row['caughtStatus'] . "\t";
			echo $row['name'] . "\t";
			echo $row['type'] . "\t";
		}	
	
		// provide output in pokedex_table

		// use ajax




	}



	// close html
	render("footer");


?>
