<?php
namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Controller
{
    protected $twig;

    public function __construct()
    {
        $projectRoot = dirname(__DIR__, 2);
        $loader = new FilesystemLoader($projectRoot . '/views');
        $this->twig = new Environment($loader);
    }

    protected function render($view, $data = [])
    {
        echo $this->twig->render($view, ['session' => $_SESSION, ...$data]);
    }
}
