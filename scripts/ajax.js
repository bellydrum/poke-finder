// value is form value
// id is id of div to inject response html

function ajax_request(rowsObject)
{
	if(!rowsObject)
		return;

	// create new ajax object
	var aj = new XMLHttpRequest();

	// when page is loaded, have a callback function pre-fill our div
	aj.onreadystatechange = function()
	{
		if(aj.readyState == 4 && aj.status == 200)
		{
			
		}
	};

	aj.open("GET", '../views/pokedex_table.php', true);
	aj.send();
}


function showTable(




