<?php
	session_start();
	
	require('includes/config.php');


	// if not logged in, redirect to login page
	if(!isset($_SESSION['username']))
		header('Location: login.php');

	render('header', ['title'=>'About Poke-Finder']);

	// insert pokemon logo
	render('pokemon_logo');

	echo "Hello, world!\n";


	render('footer');
?>
