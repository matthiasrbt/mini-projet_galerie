<?php namespace Util;

use Util\View;
use Configuration\Config;

class Route
{
    public function __construct($config)
    {
        $namespace = $config['namespace'];
        $default_controller = $config['default_controller'];
        $default_method = $config['default_method'];

        $c = $_SESSION['Index_path_length'];//Emplacment du controleur dans l'url
        $m = $_SESSION['Index_path_length'] + 1;//Emplacment de la méthode dans l'url

        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $controller = !empty($url[$c]) ? $url[$c] : $default_controller;
        $method = !empty($url[$m]) ? $url[$m] : $default_method;
        $class = $namespace."\\".$controller;

        if (! class_exists($class)) {
            return $this->not_found();
        }

        if (! method_exists($class, $method)) {
            return $this->not_found();
        }

        $classInstance = new $class;

        call_user_func_array(array($classInstance, $method), $args=[]);
    }

    public function not_found()
    {
        $view = new View();
        return $view->render('404');
    }
}