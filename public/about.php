<?php
	session_start();
	
	require('includes/config.php');


	// if not logged in, redirect to login page
	if(!isset($_SESSION['username']))
		header('Location: login.php');

	render('header', ['title'=>'About Poke-Finder']);

	// insert pokemon logo
	render('pokemon_logo');

	echo "<div id='about'>Poke-Finder is your helper for keeping track of your National Dex. This page is under construction. This page will have a list of functionality as well as plans for the future. Message me on reddit at /u/b3llydrum if you want to contact me!</div>";


	render('footer');
?>
