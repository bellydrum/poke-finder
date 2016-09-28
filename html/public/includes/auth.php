<?php

	if(getenv("PHP_ENV") == "production")
	{
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));		

		$host = $url["host"];
		$user = $url["user"];
		$pass = $url["pass"];
		$name = substr($url["path"], 1);
	}
	else
	{
		$host = 'localhost';
		$user = 'b3llydrum';
		$pass = 'Bittie90';
		$name = 'pokedex';
	}

	$db = new PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// for debugging
	// echo 'Connected successfully!';


?>
