





/* makes pokeball disappear! wow!! */

$(document).ready(function() {
	$('.pokeball-wrapper').click(function() {
		$(this).children('img.fadedPokeball').fadeTo('fast', 1.0);
		$(this).children('img.opaquePokeball').fadeTo('fast', 0.1);
		$(this).children('img').toggleClass('fadedPokeball opaquePokeball');
		
		// put ajax call here					






	});
});


$('.button').mouseenter(function() {
	$(this).animate({'background-color':'#ffff99', 'letterSpacing':'+=2px', 'fontSize':'+=2px'}, 'fast');
});
$('.button').mouseleave(function() {
	$(this).animate({'background-color':'silver', 'letterSpacing':'-=2px', 'fontSize':'-=2px'}, 'fast');
});
