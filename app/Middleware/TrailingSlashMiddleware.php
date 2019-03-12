<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TrailingSlashMiddleware implements MiddlewareInterface
{


    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
             $url = $request->getUri()->getPath();
         var_dump($url);
         die();
    }
}
