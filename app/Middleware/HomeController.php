<?php
namespace App\Middleware;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface as IResponse;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;

class HomeController implements MiddlewareInterface
{


    public function process(Request $request, Handler $handler): IResponse
    {
        return new Response(200, [], 'coucou');
    }
}
