<?php
namespace App\Middleware;

use App\Generique\Controller;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as IResponse;
use Psr\Http\Server\RequestHandlerInterface as Handler;

class HomeController extends Controller
{


    public function process(ServerRequestInterface $request, Handler $handler): IResponse
    {
        return $this->render('home.twig');
    }
}
