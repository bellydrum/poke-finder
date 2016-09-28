<?php

	echo "gate 1";


	session_start();
	require('includes/config.php');
	echo "gate 2";


	render('header', ['title'=>"Log in to your Pokedex"]);
	echo "gate 3";


	// insert that badass pokemon logo we all know and love
	render('pokemon_logo');

	// if re-entering web page via login form with user's $_POST data
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		// store user info in variables
		$username = $_POST['username'];
		$password = $_POST['password'];

		// create statement to pull user data from database
		$statement = $db->prepare("SELECT * FROM user WHERE username = :name;");
		$statement->bindParam(':name', $username);
		$statement->execute();

		// check password
		$results = $statement->fetch(PDO::FETCH_ASSOC);
		$passwordResult = $results['password'];

		if($statement->rowCount() > 0)
		{
			if(password_verify($password, $passwordResult))
			{
				// everything checks out!

				// create session globals
				$_SESSION['username'] = $username;
				$_SESSION['loggedIn'] = true;
				
				
				// now that session globals exist, redirect to homepage
				header('Location: index.php');
			}
			else
				print("<div id='warning'>Incorrect password.</div>");
		}
		else
			print("<div id='warning'>Incorrect username.</div>");

	echo "gate 666";
	}

	//render('about_div');
	render('login_form');
	render('register_request');

	echo "gate 4";



	// close html and add javascript
	render('footer');
	echo "gate 5";
?>
