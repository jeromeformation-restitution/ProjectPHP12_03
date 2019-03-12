<?php

use App\App;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = ServerRequest::fromGlobals();


// création de la réponse
$app = new App();
$response=$app->handle($request);

\Http\Response\send($response);
