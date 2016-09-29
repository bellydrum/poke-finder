<?php
	session_start();
	
	require('includes/config.php');


	// if not logged in, redirect to login page
	if(!isset($_SESSION['username']))
		header('Location: login.php');

	render('header', ['title'=>'About Poke-Finder']);

	// insert pokemon logo
	render('pokemon_logo');

	echo "<div id='about-expand' class='wireframe-1'><p>Poke-Finder is your helper for keeping track of your National Dex.</p><p>This site is under construction.</p><p>This page will have a list of functionality as well as plans for the future.</p><p>Message me on reddit at /u/b3llydrum if you want to contact me!</p></div>";
	echo "<div id='about-expand'><div id='about-2' class='wireframe-1'>Here is how to use Poke-finder:</div>";
	echo "<table id='about-table' class='wireframe-1'><tr class='wireframe-2'><td class='wireframe-3'>Search for a Pokemon using the search parameters</td></tr><tr class='wireframe-2'><td class='wireframe-3'>Click the Pokemon to see Bulbapedia's entry on how to catch it</td></tr><tr class='wireframe-2'><td class='wireframe-3'>Click the Pokeball next to the Pokemon once you've caught it</td></tr></table></div>";

	echo "<a href='index.php'><div class='submit'>Back</div></a>";

	render('footer');
?>
