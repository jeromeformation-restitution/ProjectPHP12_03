<?php
namespace App\Router;

use Zend\Expressive\Router\Route;
use Psr\Http\Server\MiddlewareInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Psr\Http\Message\ServerRequestInterface;

class Router
{
    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }

    public function addRoute(string $url, MiddlewareInterface $controller, ?string $name = null): void
    {
        $route = new Route($url, $controller, null, $name);
        $this->router->addRoute($route);
    }

    public function match(ServerRequestInterface $request): ?MiddlewareInterface
    {
        $routeResult = $this->router->match($request);
        
        if ($routeResult->isSuccess()) {
            $controlerResult = $routeResult->getMatchedRoute()->getMiddleware();
        } else {
            $controlerResult = null;
        }
        
        return $controlerResult;
    }
}
