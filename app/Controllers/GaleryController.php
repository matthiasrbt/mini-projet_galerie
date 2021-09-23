<?php namespace Controllers;

use util\View;
use Models\containerFichier;
use Models\fichier;

class GaleryController
{
    public function accueilGalery()
    {
        if(empty($_SESSION['listeFichiers']))
        {
            $_SESSION['listeFichiers'] = new containerFichier();
        }
        $listeFichier = $_SESSION['listeFichiers']->listeLesFichiersParType();
        $view = new View();
        $view->view('card_galerie.twig', ['files' => $listeFichier ]);
    }
}