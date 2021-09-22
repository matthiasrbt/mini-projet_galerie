<?php namespace Controllers;

use util\View;
use Models\containerFichier;

class GaleryController
{
    public function accueilGalery()
    {
        if(empty($_SESSION['ListeFichiers']))
        {
            $_SESSION['ListeFichiers'] = new containerFichier();
        }

        $view = new View();
        $view->render('../views/images/index');
    }
}