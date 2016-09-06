
/* makes pokeball icon disappear! wow!! */

$(document).ready(function() {

	/* when clicking the pokeball icon, toggle it on and off  */

	$('.pokeball-wrapper').click(function() {
		$(this).children('img.fadedPokeball').fadeTo('fast', 1.0);
		$(this).children('img.opaquePokeball').fadeTo('fast', 0.3);
		$(this).children('img').toggleClass('fadedPokeball opaquePokeball');

	/* then toggle the pokemon's 'caught / uncaught' status in the database */

		// pull nationalDex number of pokemon whose pokeball user clicked
		// send it to a php sql query via ajax
		var nationalDex = $(this).children('img').attr('id');
		$.ajax({
			type:'POST',
			url:'../includes/updateStatement.php',
			data:{id:nationalDex},
			error:function(result) {
				alert(result.status);
			}
		});
	});
});





/* makes row removable if not looking at list of all pokemon */

$(document).ready(function() {
	$('.removable').click(function() {
		$(this).parent().fadeOut(400);
	});
});





/* makes hovering over buttons look cool */

$(document).ready(function() {
        $('.button').mouseenter(function() {
                $(this).animate({'background-color':'#ffff99', 'letterSpacing':'+=2px', 'fontSize':'+=1px'}, 'fast');
        });
        $('.button').mouseleave(function() {
                $(this).animate({'background-color':'silver', 'letterSpacing':'-=2px', 'fontSize':'-=1px'}, 'fast');
        });
});

