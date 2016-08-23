<select name="generation">
	<option value="">Select a generation</option>
	<option value=""></option>
	<?php
		for($i=1; $i<8; $i++)
		{
			echo "<option value='{$i}'>{$i}</option>";
		}
	?>
</select>
