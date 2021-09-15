<?php namespace Controllers;

class GaleryController
{
    private $view;

    /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

    public function route()
    {
        $length = $_SESSION['Index_path_length'] - 2 ;//Longueur du chemin jusqu'à la racine de notre solution
        //Début de la trame du cemin absolue
        $route = '';
        for( $i = 0 ; $i < $length ; $i++ )
        {
            $route = $route.'/'.$_SESSION['Index_path'][$i];
        }
        //Fin de la trame du cemin absolue
        return $route;
    }

    public function acceuilGalery()
    {
        $chemin = $this->route();
        $this->head($chemin);//problème avec le routage et htaccess donc usage de chemins absolus passé en paramètres
        $this->barnav($chemin);//problème avec le routage et htaccess donc usage de chemins absolus passé en paramètres
        $this->Galery();
        $this->listeLivresAcceuil();
    }

    public function head($route)
    {
        $view = new View;
        $view->render("general/head", array("route" => $route));
    }

    public function barnav($route)
    {
        $view = new View;
        $view->render("general/barnav", array("route" => $route));
    }

    /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
}