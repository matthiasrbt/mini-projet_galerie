<?php namespace Controllers;

use util\View;

class GaleryController
{
    public function accueilGalery()
    {
        $phrase = "HelloWord";
        $view = new View();
        $view->render('images/index', ['phrase' => $phrase]);
    }
}