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
		print($caughtStatus);
		// use input to create sql statements

		// provide output in pokedex_table

		// use ajax




	}



	// close html
	render("footer");


?>
