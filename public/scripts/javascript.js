
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
		var name = $(this).children('img').attr('id');
		// here might fuck up
		var state = $(this).children('img').attr('class');
		$.ajax({
			type:'POST',
			url:'/includes/updateStatement.php',
			// if above fucks up, remove state:state
			data:{id:name, state:state},
			/*data:{id:name,state:state},*/
			error: function(xhr, status, error) {
				var err = eval("(" + xhr.responseText + ")");
				alert(err.Message);
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
                $(this).animate({
			'background-color':'#ffff99'
			}, 75);
        });
        $('.button').mouseleave(function() {
                $(this).animate({
			'background-color':'silver'
			}, 75);
        });
});


/* makes hovering over forms look cool */
$('.form-wrapper').ready(function() {

	$('.form-wrapper').mouseenter(function() {
		$(this).animate({
			'background-color':'#64c2e2',
			'opacity':'1'
			}, 75);
		if(!($(this).hasClass('expanded'))) {
			$(this).addClass('expanded');
		}
		if($(this).attr('id') == 'name-wrapper') {
			if($('#criteria-wrapper').hasClass('expanded')) {
				$('#criteria-wrapper').removeClass('expanded');
				$('#criteria-wrapper').animate({
	                                'background-color':'#2bade2',
        	                        'opacity':'0.3'
                                	}, 30);
			}
		}
		if($(this).attr('id') == 'criteria-wrapper') {
			if($('#name-wrapper').hasClass('expanded')) {
				$('#name-wrapper').removeClass('expanded');
				$('#name-wrapper').animate({
                                	'background-color':'#2bade2',
                        	        'opacity':'0.3'
	                                }, 30);
			}
		}
	});
});


$('.header-button-wrapper').ready(function() {

	$('.header-button-wrapper').mouseenter(function() {
		$(this).animate({
			'background-color':'#64c2e2',
			'opacity':'1'
			}, 75);
	});
	$('.header-button-wrapper').mouseleave(function() {
		$(this).animate({
			'background-color':'#2bade2',
			'opacity':'0.3'
			}, 75);
	});
});



