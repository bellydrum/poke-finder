// emulates dropdown menu
// tympanus.net/codrops/2012/10/04/custom-drop-down-list-styling/

obj.dd.on('click', function(event) {
	$(this).toggleClass('active');
	return false;
});

$(function() {
	var dd = new DropDown( $('#dd') );
	
	$(document).click(function() {
		// all dropdowns	
		$('.wrapper-dropdown-1').removeClass('active');
	});
});
