<?php
namespace Generique\Renderer;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRenderer
{
    
    private $twig;
    public function __construct(string $path)
    {
        $loader = new FilesystemLoader($path);
        $this->twig = new Environment($loader, [
        'cache' => false,
        ]);
    }

    public function render(string $view, array $variable = []):string
    {
        return $this->twig->render($view, $variable);
    }
}
