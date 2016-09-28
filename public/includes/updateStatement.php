<?php
	// this file is called by clicking the pokeball button
	// it toggles the pokemon's 'caught/uncaught' status in the database

	// start session
	session_start();

	// define pdo object parameters
	require('auth.php');

	// prepare and execute statement to pull the name of the pokemon the user caught
	$statement = $db->prepare("SELECT *
				FROM pokemon
				WHERE name = :name;");
	$statement->execute(array(':name' => $_POST['id']));

	// retrieve information from the select statement and assign pokemon's name to variable
	$rows = $statement->fetch(PDO::FETCH_ASSOC);
	$username = $_SESSION['username'];
	$pokemon = $rows['name'];
	print_r($_POST['state']);

	// prepare and execute statement based on whether user is catching or un-catching pokemon
	if($_POST['state'] == 'opaquePokeball')
	{
        	$statement = $db->prepare("INSERT INTO user_pokemon
                                  	(username, pokemon)
                                  	VALUES
                                  	(:username, :pokemon);");
        	$statement->bindValue(':username', $username);
        	$statement->bindValue(':pokemon', $pokemon);
        	$statement->execute();
	}
	else if($_POST['state'] == 'fadedPokeball')
	{
		$statement = $db->prepare("DELETE FROM user_pokemon
					  WHERE
					  (username = :username AND pokemon = :pokemon);");
		$statement->bindValue(':username', $username);
		$statement->bindValue(':pokemon', $pokemon);
		$statement->execute();
	}
?>
