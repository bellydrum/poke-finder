<?php
	require('../includes/config.php');
	
	// generate base html
	render("header", ["title"=>"Pokemon Finder"]);
	render("pokedex_form");




	// if arriving at page via submit button
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// gather input from $_POST
		$caughtStatus = $_POST['caughtStatus'];
		$type = $_POST['type'];
		$generation = findRange($_POST['generation']);
		$genStart = $generation[0];
		$genEnd = $generation[1];




		// use input to create sql statements
		$statement = generateStatement($caughtStatus, $type, $genStart, $genEnd);

		print($statement . "\n");
		$sql_command = "SELECT * FROM pokemon {$statement} ORDER BY nationalDex;";
		print($sql_command);

		// provide output in pokedex_table

		// use ajax




	}



	// close html
	render("footer");


?>
