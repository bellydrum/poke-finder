<?php
	// custom functions are found in '../includes/helpers.php'
	// this is imported by config.php
	require('../includes/config.php');
	
	// generate base html
	render('header', ['title'=>"Pokemon Finder"]);

	// render pokemon header
	render('pokemon_logo');

	// generate search form
	render('pokedex_form');

	// if arriving at page via form submit $_POST method
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// gather input from $_POST
		$caughtStatus = $_POST['caughtStatus'];
		$type = $_POST['type'];
		$type2 = $_POST['type2'];
		$generation = findRange($_POST['generation']);
		$genStart = $generation[0];
		$genEnd = $generation[1];

		// use input to generate sql query and store resulting query string in a variable
		$whereClause = generateStatement($caughtStatus, $type, $type2, $genStart, $genEnd);
		
		require('../includes/statements.php');

		// uncomment to see the sql query that generateStatement() is generating
		// print($selectStatement);

		// pull information from database and store in $rows
		$rows = $db->query($selectStatement);
	}

	// if arriving at page via url $_GET method	
	else if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		// insert text explaining table of uncaught pokemon
		require('../views/explainer.php');

		// pull all uncaught pokemon from database
		$rows = $db->query("SELECT * FROM pokemon WHERE caughtStatus = 'uncaught';");
	}

	// generate table using query results
	require('../views/pokedex_table.php');

	// close html
	render("footer");

?>