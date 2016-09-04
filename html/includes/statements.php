<?php
	
	$selectStatement = "SELECT * FROM pokemon " . $whereClause . " ORDER BY nationalDex;";

	$updateStatement = "UPDATE pokemon SET caughtStatus = CASE WHEN caughtStatus = 'caught' THEN 'uncaught' WHEN caughtStatus = 'uncaught' THEN 'caught' END;";

?>
