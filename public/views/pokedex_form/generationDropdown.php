<select id='select-box' name='generation'>
	<option value="">Pokedex</option>
	<option value=""></option>
	<?php
		for($i=1; $i<8; $i++)
		{
			echo "<option value='{$i}'>Gen {$i}</option>";
		}
	?>
</select>
