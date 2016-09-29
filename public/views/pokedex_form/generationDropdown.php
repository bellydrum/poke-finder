<select id='select-box' name='generation'>
	<option value="">Generation</option>
	<option value=""></option>
	<?php
		for($i=1; $i<8; $i++)
		{
			echo "<option value='{$i}'>{$i}</option>";
		}
	?>
</select>
