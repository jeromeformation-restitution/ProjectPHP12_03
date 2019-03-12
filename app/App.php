<?php
namespace App;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use App\Middleware\TrailingSlashMiddleware;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
 
class App implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(200, [], 'coucou');
        
        $ts = new TrailingSlashMiddleware;
        $ts->process($request, $this);
        


        return $response ;
    }
}
