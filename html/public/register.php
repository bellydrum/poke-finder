<?php
	session_start();
	require('../includes/config.php');

	render('header', ['title'=>"Get your own Pokedex!"]);

	// insert that badass pokemon logo we all know and love
	render('pokemon_logo');

	// if entering web page via url
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		render('register_form');
	}

?>
