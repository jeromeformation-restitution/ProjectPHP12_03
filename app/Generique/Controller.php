<?php
namespace App\Generique;

use GuzzleHttp\Psr7\Response;
use Generique\Renderer\TwigRenderer;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface as IResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;

abstract class Controller implements MiddlewareInterface
{

    private $twig;

    public function __construct(TwigRenderer $twig)
    {
        $this->twig=$twig;
    }


    public function render(string $view, array $variable = []): IResponse
    {
        return new Response(200, [], $this->twig->render($view, $variable));
    }
}
