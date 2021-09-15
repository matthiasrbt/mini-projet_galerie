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

        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $controller = !empty($url[2]) ? $url[2] : $default_controller;
        $method = !empty($url[3]) ? $url[3] : $default_method;
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