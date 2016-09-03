

/* makes pokeball disappear! wow!! */

$(document).ready(function() {
	$('.removable').click(function() {
		$(this).parent().fadeOut(500);

		/*    uncomment this when i've got my shit figured out
		$(this).children('img.fadedPokeball').fadeTo('fast', 1.0);
		$(this).children('img.opaquePokeball').fadeTo('fast', 0.1);
		$(this).children('img').toggleClass('fadedPokeball opaquePokeball');
		*/		



		// put ajax call here					
		$.ajax({
			url:'../includes/updateStatement.php',
		});
	});
});



$('.pokeball-wrapper').click(function() {
	var id = $(this).attr('id')
});



$('.button').mouseenter(function() {
	$(this).animate({'background-color':'#ffff99', 'letterSpacing':'+=2px', 'fontSize':'+=1px'}, 'fast');
});
$('.button').mouseleave(function() {
	$(this).animate({'background-color':'silver', 'letterSpacing':'-=2px', 'fontSize':'-=1px'}, 'fast');
});
