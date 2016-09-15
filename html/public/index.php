<?php
	session_start();


	// page setup

	// if not logged in, redirect to login page
	if(!isset($_SESSION['username']))
		header('Location: login.php');

	// custom functions are found in '../includes/helpers.php'
	// this is imported by config.php
	require('../includes/config.php');

	// render page
	render('header', ['title'=>"Pokemon Finder"]);
	render('pokemon_logo');
	render('header_menu');
	render('pokedex_form');


	// generate page data

	// if arriving at page via form submit $_POST method
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// if user used the name text field form
		if(isset($_POST['name']))
		{
			$name = $_POST['name'];
			$selectStatement = generateNameStatement($name);
			$rows = $db->query($selectStatement);
		}

		// if user used the dropdown criteria form
		else if(isset($_POST['caughtStatus']))
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
			//print($selectStatement);
		}

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

	
	// table generation

	if(isset($rows))
	{
		// generate table using query results
		require('../views/pokedex_table.php');
	}


	// close html
	render("footer");
?>
