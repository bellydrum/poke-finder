// value is form value
// id is id of div to inject response html

function ajax_request(value, id)
{
	if(value == "")
		return;

	// create new ajax object
	var aj = new XMLHttpRequest();

	// when page is loaded, have a callback function pre-fill our div
	aj.onreadystatechange = function()
	{
		if(aj.readyState == 4 && aj.status == 200)
		{
			$(id).html(aj.responseText);
			// do something to the page
		}
	};

	aj.open("GET",'../views/pokemon/' +  value + '.html', true);
	aj.send();
}
