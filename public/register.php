<?php
	session_start();
	require('includes/config.php');

	render('header', ['title'=>"Get your own Pokedex!"]);

        // insert that badass pokemon logo we all know and love
        render('pokemon_logo');

	// if entering web page via url
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// if all required fields are filled out
		if($_POST['firstName'] != '' &&
		   $_POST['lastName'] != '' &&
		   $_POST['username'] != '' &&
		   $_POST['password'] != '' &&
		   $_POST['confirmation'] != '' &&
		   $_POST['email'] != '')
		{

			// store user inputs in variables
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirmation = $_POST['confirmation'];
			$email = $_POST['email'];
			// non-required; may leave empty
			if($_POST['zipCode'] != '')
				$zipCode = $_POST['zipCode'];
			else
				$zipCode = NULL;
			if($_POST['signature'] != '')
				$signature = $_POST['signature'];
			else
				$signature = 'No signature';

			// generate two prepared statements, one for pokedex.user and one for pokedex.user_extra
			$statement1 = $db->prepare("INSERT INTO user
						   (username, password)
						   VALUES
						   (:username, :password);"
						  );
			$statement1->bindParam(':username', $username);
			$statement1->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
			$statement2 = $db->prepare("INSERT INTO user_extra
						   (first_name, last_name, email, zip_code, signature)
						   VALUES
						   (:firstName, :lastName, :email, :zipCode, :signature);"
						  );
			$statement2->bindParam(':firstName', $firstName);
			$statement2->bindParam(':lastName', $lastName);
			$statement2->bindValue(':email', $email);
			$statement2->bindParam(':zipCode', $zipCode);
			$statement2->bindParam(':signature', $signature);


			// check if user already exists in the database
			$usernameCheckerStatement = $db->prepare("SELECT *
								 FROM user
								 WHERE username = :username;"
								);
			$usernameCheckerStatement->bindParam(':username', $username);
			$usernameCheckerStatement->execute();
			$rows = $usernameCheckerStatement->fetch(PDO::FETCH_ASSOC);

			// if the username check comes back empty
			if(!$rows['username'])
			{
				// and if inserting the new user goes without error
                		if($statement1->execute() && $statement2->execute())
                		{
                        		// create session globals
					$_SESSION['username'] = $username;
					$_SESSION['loggedIn'] = true;

                        		// redirect logged in user to homepage
					header('Location: index.php');
                		}
			}
			// or if the username check pulls back a matching username already in the system
			else
				print("<div class='warning'>That username already exists!</div>");
		}
		// or if there are required fields left empty
		else
		{
			// if the password and confirmation fields do not match, alert user
			if($_POST['password'] != $_POST['confirmation'])
				print("<div class='warning'>Your passwords do not match!</div>");
			// if they do match and there are required fields left empty, alert user
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
