<?php
namespace App\Middleware;

use App\Generique\Controller;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface as IResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;

class ContactController extends Controller
{


    public function process(Request $request, Handler $handler): IResponse
    {
        return $this->render('contact.twig');
    }
}
