<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View {
    private Environment $twig;

    //Carrega o Twig e define o caminho das views na pasta definida como Views
    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($loader);
    }

    public function render(string $template, array $data = []) {
        $template = str_replace('.' , '/', $template);
        $template = $template . '.twig.php';
        
        echo $this->twig->render($template, $data);
    }

    public function redirect(string $uri) {
        header('Location: ' . $uri, true, 302);
        exit;
    }
}