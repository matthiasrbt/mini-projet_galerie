<?php namespace util;

require_once '../vendor/autoload.php';

class View {

    public function view($path, $data = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
        echo $twig->render($path, $data);
    }
}
