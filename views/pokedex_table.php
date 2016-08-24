<div id="table_div">
	<table id='pokedex-table'>
		<thead>
			<tr id='table-head'>
				<td>Caught</td>
				<td>Pokedex</td>
				<td>Name</td>
				<td>Type</td>
			</tr>
		</thead>

		<tbody id='table-body'>
			<?php foreach($rows as $row): ?>
			<tr id='table-row'>
				<td id='caughtCell'>
					<?php if($row['caughtStatus'] == "caught")
						{
							echo "<img src='../includes/images/pokeball.png' />";
						}
					?></td>
				<td id='nationalDexCell'><?= $row['nationalDex']?></td>
				<td id='nameCell'><?= $row['name']?></td>
				<td id='typeCell'><?php echo $row['type'];

					if($row['type2'] != 'NULL')
					{
						echo " / " . $row['type2'];
					} ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>

	</table>
</div>
