<?php
	// create stream
	$opts = array(
		'http'=>array(
			'method'=>'GET',
		)
	);
	
	$context = stream_context_create($opts);
	
	$params = [
    'token' => $_GET['token'],
    'agencyName' => $_GET['agency'],
    'stopName' => $_GET['stopname']
	];

	$file = file_get_contents(sprintf("http://services.my511.org/Transit2.0/GetNextDeparturesByStopName.aspx?%s", http_build_query($params)));
	echo(json_encode(simplexml_load_string($file)));
?>
