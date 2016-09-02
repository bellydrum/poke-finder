<!-- table of pokemon results -->

<!-- table wrapper -->
<div id="table-div" class='section-div'>

	<?php if($rows): ?>

	<!-- table -->
	<table id='pokedex-table'>

		<!-- table head -->
		<thead>
			<tr id='table-head'>
				<td class='head-cell'>Caught</td>
				<td class='head-cell'>Pokedex</td>
				<td class='head-cell'>Name</td>
				<td class='head-cell'>Type</td>
			</tr>
		</thead>

		<!-- table body -->
		<tbody id='table-body'>
		
		<!-- loop through each returned data row from the sql query
		     and build a table row out of each piece of information -->
		<?php foreach($rows as $row): ?>

			<!-- table row wrapper -->
			<div class='table-row-class'>

				<!-- table row -->
				<tr class='table-row'>

					<!-- opaque pokeball png if caught; faded image if uncaught -->
					<td class='pokeball-wrapper'>
							<?php
								echo "<img src='../includes/images/pokeball.png' ";
								
								if($row['caughtStatus'] == "caught") {
									echo "class='opaquePokeball'";
								}
								else if($row['caughtStatus'] == 'uncaught') {
									echo "class='fadedPokeball'";
								}

								echo " />";
							?>
					</td>

					<!-- display national dex number -->
					<td id='nationalDexCell'><?= $row['nationalDex']?></td>

					<!-- display pokemon species -->
					<td id='nameCell'><?= $row['name']?></td>

					<!-- display pokemon type -->
					<td id='typeCell'><?php
						echo $row['type'];
						if($row['type2'] != 'NULL') {
							echo " / " . $row['type2'];
						} ?></td>
				</tr>
			</div>

		<?php endforeach; ?>

		</tbody>
	</table>

	<?php endif; ?>
</div>
