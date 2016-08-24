// emulates dropdown menu

var caughtStatusList = [
	{
		label: '', value: ''
	},
	{
		label: 'Caught', value: 'caught'
	},
	{
		label: 'Uncaught', value: 'uncaught'
	}]

$().ready(function() {
	$('#caughtStatus').autocomplete({
		min.Length: 0,
		source: caughtStatusList,
		delay: 0,
		focus: function( event, ui ) {
			$(this).val( ui.item.label );
			return false;
		},
		select: function( event, ui ) {
			$(this).blur();
			$(this.val( ui.item.label );
			return false;
		},
		change: function (event, ui ) {
			if ($(".ui-autocomplete li:textEquals('" + $(this).val() + "')").size() == 0) {
				$(this).val('');
				$('#hidPositionType').val('');
			}
		},
		close: function(event, ui) {
			$(this).blur();
			return false;
		}
	})
	.focus(function() {
		$(this).autocomplete('search','');
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li></li>" )
			.data( "item.autocomplete", item)
			.append( "<a>" + item.label + "</a>" )
			.appendTo( ul );
		};
	});
