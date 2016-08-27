<?php
	require('../includes/config.php');
	
	// generate base html
	render("header", ["title"=>"Pokemon Finder"]);

	// generate search form
	render("pokedex_form");

	// if arriving at page via search form submit button
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
		$type2 = $_POST['type2'];
		$generation = findRange($_POST['generation']);
		$genStart = $generation[0];
		$genEnd = $generation[1];

		// use input to create sql query and store results in a variable
		$whereClause = generateStatement($caughtStatus, $type, $type2, $genStart, $genEnd);
		$statement = "SELECT * FROM pokemon " . $whereClause . " ORDER BY nationalDex;";		
		$rows = $db->query($statement);
		
		// generate data table using SQL query results
		require('../views/pokedex_table.php');
	
		// provide output in pokedex_table

		// use ajax




	}



	// close html
	render("footer");


?>
