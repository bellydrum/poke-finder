

$(document).ready(function() {

	/* the following listeners are activated once the whole page is loaded */


	/* makes pokeball disappear! wow!! */
	$('.pokeball-wrapper').click(function() {
		$(this).children('img.fadedPokeball').fadeTo('fast', 1.0);
		$(this).children('img.opaquePokeball').fadeTo('fast', 0.1);
		$(this).children('img').toggleClass('fadedPokeball opaquePokeball');
	});

	
	/* makes hovering around the buttons look cool */
	$('.button').mouseenter(function() {
		$(this).animate({'background-color':'#ffff99', 'letterSpacing':'+=2px', 'fontSize':'+=1px'}, 'fast');
	});
	$('.button').mouseleave(function() {
		$(this).animate({'background-color':'silver', 'letterSpacing':'-=2px', 'fontSize':'-=1px'}, 'fast');
	});



});

$(document).ready(function() {
	$('.removable').click(function() {
		$(this).parent().fadeOut(400);
	});
});
