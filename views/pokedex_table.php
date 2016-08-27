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

			<!-- table row -->
			<tr id='table-row'>

				<!-- pokeball png if caught; no image if uncaught -->
				<td id='caughtCell'><?php
					if($row['caughtStatus'] == "caught"){
						echo "<img src='../includes/images/pokeball.png' />";
					} ?></td>

				<!-- display national dex number -->
				<td id='nationalDexCell'><?= $row['nationalDex']?></td>

				<!-- display pokemon species -->
				<td id='nameCell'><?= $row['name']?></td>

				<!-- display pokemon type -->
				<td id='typeCell'><?php
					echo $row['type'];
					if($row['type2'] != 'NULL'){
						echo " / " . $row['type2'];
					} ?></td>
			</tr>

		<?php endforeach; ?>

		</tbody>
	</table>

	<?php endif; ?>
</div>
