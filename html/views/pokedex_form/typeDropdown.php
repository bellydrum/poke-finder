<?php
	$file = '../views/pokedex_form/type_list.txt';
	$types = file($file, FILE_IGNORE_NEW_LINES);
?>

<select id='select-box' class='button' name='type'>
	<option value="">Type</option>
	<option value=""></option>
	<?php foreach($types as $type): ?>
		<?="<option value='{$type}'>{$type}</option>"?>
	<?php endforeach; ?>

</select>
