<?php namespace Controllers;

use Imagick;
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
        /*foreach($listeFichier as $unFichier)
        {
            echo 'Route : '.$unFichier['chemin'].'<br>';
            if($unFichier['type'] == "pdf")
            {
                $im = new Imagick('../tmp/'.$unFichier['nom'].'.pdf');
                $im->setIteratorIndex(0);
                $im->setCompression(Imagick::COMPRESSION_LZW);
                $im->setCompressionQuality(90);
                $im->writeImage('../tmp/miniatures/'.$unFichier['nom'].'.png');
                $unFichier['miniature'] = '../tmp/miniatures/'.$unFichier['nom'].'.png';
                echo 'Route miniature pdf: '.$unFichier['chemin'].'<br><br>';

                //<embed width="191" height="207" name="plugin" src="http://localhost:54149/Documento/VersaoView?chave=FDC4875EE17FB17B" type="application/pdf">
            }
        }*/
        $view = new View();
        $view->view('card_galerie.twig', ['files' => $listeFichier ]);
    }

    public function uploadFile()
    {
        $view = new View();
        $view->view('upload.twig', '');
    }
}