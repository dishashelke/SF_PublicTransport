<?php
	// create stream
	$opts = array(
		'http'=>array(
			'method'=>'GET',
		)
	);
	
	$context = stream_context_create($opts);
	// open file using http headers set above
	if($_GET['routedirection'] === "")
		$file = file_get_contents("http://services.my511.org/Transit2.0/GetStopsForRoute.aspx?token={$_GET['token']}&routeIDF={$_GET['agency']}~{$_GET['routecode']}", false, $context);
	else
		$file = file_get_contents("http://services.my511.org/Transit2.0/GetStopsForRoute.aspx?token={$_GET['token']}&routeIDF={$_GET['agency']}~{$_GET['routecode']}~{$_GET['routedirection']}", false, $context);
	echo(json_encode(simplexml_load_string($file)));
?>
