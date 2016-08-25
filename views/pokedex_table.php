<!-- table of pokemon results -->

<!-- div wrapper -->
<div id="table-div" class='section-div'>


	<!-- table -->
	<table id='pokedex-table'>


		<thead>
			<tr id='table-head'>
				<td class='head-cell'>Caught</td>
				<td class='head-cell'>Pokedex</td>
				<td class='head-cell'>Name</td>
				<td class='head-cell'>Type</td>
			</tr>
		</thead>



		<tbody id='table-body'>

			<!-- for each result, print a row -->
				
			<?php
				if($rows):
					foreach($rows as $row):
			?>

			<!-- row to be repeated -->

			<!--


				<a href='pokemon/<pokemonName>.php' class='pokemon-link'>
				
					<div class'pokemon-row'>

			-->

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


			<!--
				</div></a>
			-->





			<?php
				endforeach;
				endif;
			 ?>


		</tbody>



	</table>
</div>
