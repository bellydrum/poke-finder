<?php
	// this file is called by clicking the pokeball button
	// it toggles the pokemon's 'caught/uncaught' status in the database


	// define pdo object parameters
	require('auth');

	// build a customizable insert query
	$statement = $db->prepare("UPDATE pokemon SET caughtStatus = (CASE WHEN (caughtStatus = 'caught') THEN 'uncaught' WHEN (caughtStatus = 'uncaught') THEN 'caught' END) WHERE nationalDex = (:nationalDex);");

	// customize the query with data given by the ajax request
	$statement->bindParam(':nationalDex', $_POST['id']);

	// execute the customized sql query
	$statement->execute();
?>
