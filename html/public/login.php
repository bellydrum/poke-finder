<?php
	session_start();
	require('../includes/config.php');

	render('header', ['title'=>"Log in to your Pokedex"]);

	// insert that badass pokemon logo we all know and love
	render('pokemon_logo');






	// if entering web page via url
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
	}




	// if re-entering web page via login form with user's $_POST data
	else if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		// store user info in variables
		$username = $_POST['username'];
		$password = $_POST['password'];

		// create statement to pull user data from database
		$statement = $db->prepare("SELECT * FROM user WHERE username = :name;");
		$statement->bindParam(':name', $username);
		$statement->execute();

		if($statement->rowCount() > 0)
		{
			$_SESSION['username'] = $username;
			$_SESSION['loggedIn'] = true;

			// now that session globals exist, redirect to homepage
			header('Location: index.php');
		}
		else
		{
			print("<div id='warning'>Incorrect username or password.</div>");
		}
	}

	render('login_form');
	render('register_request');

?>
