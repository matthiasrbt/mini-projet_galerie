<?php namespace Controllers;

use util\View;

class GaleryController
{
    public function accueilGalery()
    {
        $view = new View();
        $view->render('../views/images/index');
    }
}