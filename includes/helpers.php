<?php
	// renders html template
	function render($template, $data=[])
	{
		$path = __DIR__ . '/../views/' . $template . '.php';
		if(file_exists($path))
		{
			extract($data);
			require($path);
		}
	}
?>
