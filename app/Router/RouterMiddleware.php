<?php

namespace App\Router;

use App\Router\Router;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouterMiddleware implements MiddlewareInterface
{

    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        $controler = $this->router->match($request);




        if (!is_null($controler)) {
            $response = $controler->process($request, $handler);
        } else {
            $response = new Response(404, [], 'Page inexistante !');
        }

        //die('Fin RouterMiddleware->process');

        return $response;
    }
}
