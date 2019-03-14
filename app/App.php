<?php
namespace App;

use GuzzleHttp\Psr7\Response;
use App\Middleware\HomeController;
use Psr\Http\Message\ResponseInterface;
use App\Middleware\TrailingSlashMiddleware;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class App implements RequestHandlerInterface
{

    private $cptMiddleware = 0;
    private $tabMiddlewares;
    public function __construct(array $tabMw)
    {
        $this->tabMiddlewares=$tabMw;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        

        $middleware = $this->tabMiddlewares[$this->cptMiddleware];
        
        $this->cptMiddleware++;
        
        return $middleware->process($request, $this);
        // $controller= new HomeController;
        // $response= $controller->process($request, $this);
        // $ts = new TrailingSlashMiddleware;
        // $response = $ts->process($request, $this);
        
        // return $response ;
    }
}
