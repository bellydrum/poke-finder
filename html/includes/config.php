<?php

	ini_set("display_errors", true);
	error_reporting(E_ALL);

	session_start();

        // if not logged in, redirect to login page
	if($_SERVER['PHP_SELF'] != ('/poke-finder/html/public/login.php' || '/poke-finder/html/public/register.php'))
	{
		if(!isset($_SESSION['username']))
                	header('Location: login.php');
	}

	require('helpers.php');
	require('auth');
?>
