<?php
	session_start();
	require('../includes/config.php');

	render('header', ['title'=>"Get your own Pokedex!"]);

        // insert that badass pokemon logo we all know and love
        render('pokemon_logo');

	// if entering web page via url
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// if any of the required form inputs are empty
		if($_POST['firstName'] != '' && $_POST['lastName'] != '' && $_POST['username'] != '' &&
			$_POST['password'] != '' && $_POST['confirmation'] != '' && $_POST['email'] != '')
		{

			// store user inputs in variables
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirmation = $_POST['confirmation'];
			$email = $_POST['email'];
			if($_POST['zipCode'] != '')
				$zipCode = $_POST['zipCode'];
			else
				$zipCode = NULL;
			if($_POST['signature'] != '')
				$signature = $_POST['signature'];
			else
				$signature = 'No signature';

			// generate two prepared statements, one for each user table
			// alert user if user already exists
			$statement1 = $db->prepare("INSERT INTO user (username, password) VALUES(:username, :password);");
			$statement1->bindParam(':username', $username);
			$statement1->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
			$statement2 = $db->prepare("INSERT INTO user_extra (first_name, last_name, email, zip_code, signature) VALUES(:firstName, :lastName, :email, :zipCode, :signature);");
			$statement2->bindParam(':firstName', $firstName);
			$statement2->bindParam(':lastName', $lastName);
			$statement2->bindValue(':email', $email);
			$statement2->bindParam(':zipCode', $zipCode);
			$statement2->bindParam(':signature', $signature);


			// TODO: make some sort of catcher for the case where username already exists
			$usernameCheckerStatement = $db->prepare("SELECT * FROM user WHERE username = :username;");
			$usernameCheckerStatement->bindParam(':username', $username);
			$rows = $usernameCheckerStatement->execute();

			$rows = $usernameCheckerStatement->fetch(PDO::FETCH_ASSOC);

			if(!$rows['username'])
			{
				// if the new user insertion goes without error
                		if($statement1->execute() && $statement2->execute())
                		{
                        		// create session globals
					$_SESSION['username'] = $username;
					$_SESSION['loggedIn'] = true;

                        		// redirect user to pokedex
					header('Location: index.php');
                		}
			}
			else
				print("<div class='warning'>That username already exists!</div>");
		}
		else
		{
			if($_POST['password'] != $_POST['confirmation'])
				print("<div class='warning'>Your passwords do not match!</div>");
			else
				print("<div class='warning'>Please fill out all the fields.</div>");
		}
	}

	// insert the registration form
	render('register_form');

	// insert the link button to login page
	render('login_request');

	// close html and add javascript
	render('footer');

?>
