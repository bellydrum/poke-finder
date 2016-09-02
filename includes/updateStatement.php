<?php

	// this query switches the cell from caught to uncaught and vice versa
	$updateStatement = "UPDATE pokemon SET caughtStatus = (CASE when (caughtStatus = 'caught') then 'uncaught' WHEN (caughtStatus = 'uncaught') THEN 'caught' END);";

	// call it with pdo
	$db->query($updateStatement);




?>
