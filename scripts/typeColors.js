var tableRows = document.getElementsByClass('table-row-class');

$('.table-row-class').click(function() {
	window.location = $(this).attr('href');
});
