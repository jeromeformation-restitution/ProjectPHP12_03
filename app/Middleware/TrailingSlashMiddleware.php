<?php

namespace App\Middleware;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TrailingSlashMiddleware implements MiddlewareInterface
{


    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $url = $request->getUri()->getPath();
        $urlMoinsUn = substr($url, -1);

        var_dump($urlMoinsUn);
        
        

        if ($urlMoinsUn === "/" && strlen($url)!==1) {
            $url = substr($url, 0, -1);
            var_dump($url);

            $response = new Response(301, ['location'=>$url]);
            return $response;
        } else {
            return $handler->handle($request);
        }

        // die();
    }
}
