<?php

use App\App;
use App\Router\Router;
use GuzzleHttp\Psr7\Response;
use App\Router\RouterMiddleware;
use App\Middleware\HomeController;
use GuzzleHttp\Psr7\ServerRequest;
use App\Middleware\ContactController;
use App\Middleware\TrailingSlashMiddleware;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$request = ServerRequest::fromGlobals();

$router = new Router();
$router->addRoute('/', new HomeController);
$router->addRoute('/Contact', new ContactController);

// création de la réponse
$app = new App([new TrailingSlashMiddleware(), new RouterMiddleware($router)]);

$response=$app->handle($request);




\Http\Response\send($response);
