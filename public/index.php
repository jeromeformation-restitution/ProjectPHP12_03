<?php

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = ServerRequest::fromGlobals();
$response = new Response (200, [],'coucou');


\Http\Response\send($response);
