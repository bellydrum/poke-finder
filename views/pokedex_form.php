<div id="form_div">


	<form action="" method="POST">


		<!-- show caught or uncaught pokemon -->
		<!-- $_POST['caughtStatus'] -->
		<?php
			require('pokedex_form/caughtDropdown.php');
		?>

		<!-- show pokemon of a certain type -->
		<!-- $_POST['type'] -->
		<?php
			require('pokedex_form/typeDropdown.php');
		?>

		<!-- show pokemon of a certain generation -->
		<!-- $_POST['generation'] -->
		<?php
			require('pokedex_form/generationDropdown.php');
		?>

		<!-- show pokemon of a certain region -->
		<!-- $_POST['region'] -->
		<?php
			require('pokedex_form/regionDropdown.php');
		?>


		<!-- submit back to index.php -->
		<input type="submit" value="Go!">

	</form>
</div>
