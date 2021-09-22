<?php namespace Controllers;

use util\View;
use Models\containerFichier;

class GaleryController
{
    public function accueilGalery()
    {
        if(empty($_SESSION['ListeFichiers']))
        {
            echo "Construction du conteneur<br>";
            $_SESSION['ListeFichiers'] = new containerFichier();
            echo "Conteneur construit<br>";
        }

        $view = new View();
        $view->render('../views/images/index');
    }
}