<?php

use App\App;
use App\Router\Router;
use GuzzleHttp\Psr7\Response;
use App\Router\RouterMiddleware;
use App\Middleware\HomeController;
use GuzzleHttp\Psr7\ServerRequest;
use Generique\Renderer\TwigRenderer;
use App\Middleware\ContactController;
use App\Middleware\TrailingSlashMiddleware;

$dirname = dirname(__DIR__);

require_once $dirname . "/vendor/autoload.php";


$request = ServerRequest::fromGlobals();


//on instancie TwigRenderer

$twig = new TwigRenderer($dirname . '/templates');


$router = new Router();
$router->addRoute('/', new HomeController($twig));
$router->addRoute('/contact', new ContactController($twig));

// création de la réponse
$app = new App([new TrailingSlashMiddleware(), new RouterMiddleware($router)]);

$response=$app->handle($request);




\Http\Response\send($response);
