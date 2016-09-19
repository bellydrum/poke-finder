<div id='header-menu-wrapper'>

<?php if(strpos($_SERVER['PHP_SELF'], 'index.php')): ?>

	<a href='collection.php' class='link'>
		<div id='collection-wrapper' class='header-button-wrapper'>
			<?=ucfirst($_SESSION['username']);?>'s Collection
		</div>
	</a>

<?php elseif(strpos($_SERVER['PHP_SELF'], 'collection.php')): ?>

	<a href='index.php' class='link'>
		<div id='collection-wrapper' class='header-button-wrapper'>
			Back to Pokedex
		</div>
	</a>

<?php endif; ?>

	<a href='../public/logout.php' class='link'>
		<div id='logout-wrapper' class='header-button-wrapper'>
			Log out
		</div>
	</a>
</div>
