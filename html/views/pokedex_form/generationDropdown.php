<select id='select-box' class='button' name='generation'>
	<option value="">Generation</option>
	<option value=""></option>
	<?php
		$genList = array('Red, Blue, Yellow',
				 'Gold, Silver, Crystal',
				 'Ruby, Sapphire, Emerald',
				 'Diamond, Pearl, Platinum',
				 'Black, White, B2/W2',
				 'X, Y',
				 'Sun, Moon');
		for($i=1; $i<8; $i++)
		{
			echo "<option value='{$i}'>{$i}: {$genList[$i - 1]}</option>";
		}
	?>
</select>
