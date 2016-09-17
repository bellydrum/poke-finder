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

		<?php	
			// run the following code for each resulting row from the sql query
			foreach($rows as $row):

				$count = $row['nationalDex'];
		?>
			
			<!-- table row wrapper -->
			<div class='table-row-class'>

				<!-- table row -->
				<tr class='table-row' id='row-<?=$count;?>'>

					<!-- opaque pokeball png if caught; faded image if uncaught -->
					<td class='pokeball-wrapper<?php

							if(isset($_POST['caughtStatus']))
							{
								if((($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['caughtStatus'] != '')) ||
								    ($_SERVER['REQUEST_METHOD'] == 'GET'))
									print( " removable");
							}
								print("'>");
								echo "<img src='../includes/images/pokeball.png' ";

								if($row['caughtStatus'] == "caught") {
									echo "class='opaquePokeball'";
								}
								else if($row['caughtStatus'] == 'uncaught') {
									echo "class='fadedPokeball'";
								}

								echo " id='{$row["name"]}'/>";
							?>
					</td>

					<!-- display national dex number -->
					<td id='nationalDexCell'><?= $row['nationalDex']?></td>

					<!-- display pokemon species -->
					<?php
						$url = 'http://bulbapedia.bulbagarden.net/wiki/' . $row['name'] . '_(Pok%C3%A9mon)#Game_locations';
						// $count is defined above because it is also used to define a td id
						$icon = "";
						if($count < 10)
							$icon = "00" . $count . ".png";
						else if($count < 100)
							$icon = "0" . $count . ".png";
						else if($count < 1000)
							$icon = $count . ".png";
					?>
					<td class='nameCell'>
						<a href='<?=$url;?>'>
								<div><?= $row['name']?></div>
								<div><img src='../includes/images/icons/pokemon/<?=$icon;?>'/></div>
						</a>
					</td>

					<!-- display pokemon type -->
					<td id='typeCell'>
						<img src="../includes/images/icons/type/<?=strtolower($row['type'])?>.png"/>
					<?php
						if($row['type2'] != 'NULL'):
					?>
							<img src="../includes/images/icons/type/<?=strtolower($row['type2']);?>.png"/>
					<?php endif; ?>
					</td>
				</tr>
			</div>

		<?php endforeach; ?>

		</tbody>
	</table>


	<?php endif; ?>
</div>

<!-- this is the cute little berry footer that elle didn't like -->
<!--?php render('footer_row'); ?-->
