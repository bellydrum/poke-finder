
/* makes pokeball disappear! wow!! */

$(document).ready(function() {
	$('.pokeball').click(function() {
		$(this).children('img.fadedPokeball').fadeTo('fast', 1.0);
		$(this).children('img.opaquePokeball').fadeTo('fast', 0.1);
		$(this).children('img').toggleClass('fadedPokeball opaquePokeball');
		$.ajax({
			type:'POST',
			url:'../includes/updateStatement.php',
			cache:false,
			success: function() {alert("fuck yeah!");}
		});
	});

});
