<?php
	// Create a stream
	$opts = array(
	  'http'=>array(
		'method'=>"GET",
	  )
	);

	$context = stream_context_create($opts);
	// Open the file using the HTTP headers set above
	$file = file_get_contents("http://services.my511.org/Transit2.0/GetRoutesForAgency.aspx?token={$_GET['token']}&agencyName={$_GET['agency']}", false, $context);
	echo(json_encode(simplexml_load_string($file)));
?>
