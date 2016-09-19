<?php

	require('../includes/config.php');

	// render page
	render('header', ['title'=>"Pokemon Finder"]);
	render('pokemon_logo');
	render('header_menu');
	render('collection');

	print("<div>Collection feature coming soon.</div>");

	render('footer');

?>
