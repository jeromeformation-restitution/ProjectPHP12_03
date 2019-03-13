<?php

use App\App;
use GuzzleHttp\Psr7\Response;
use App\Middleware\HomeController;
use GuzzleHttp\Psr7\ServerRequest;
use App\Middleware\TrailingSlashMiddleware;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = ServerRequest::fromGlobals();


// création de la réponse
$app = new App([new TrailingSlashMiddleware(), new HomeController()]);
$response=$app->handle($request);

\Http\Response\send($response);
