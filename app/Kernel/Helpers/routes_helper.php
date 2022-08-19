<?php

use App\Kernel\Routing\Response;

function response(): Response
{
	$headers = [
		'Access-Control-Allow-Origin: *'
	];

	$response = new Response($headers);

	return $response;
}