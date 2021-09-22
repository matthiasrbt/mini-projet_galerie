<?php
namespace Models;

use ArrayObject;
use Models\fichier;

class containerFichier
{
    private $lesFichier;

    /**
     * containerFichier constructor.
     */
    public function __construct()
    {
        $this->lesFichiers = new arrayObject();

        $listFiles = scandir('../tmp');

        echo"<pre>";
        print_r($listFiles);
        echo "</pre>";

        for($i = 2; $i < sizeof($listFiles); $i++)
        {
            $part =  explode('.', trim($listFiles[$i],'.'));
            $unChemin = "../tmp/".$listFiles[$i];
            $this->ajouterFichier($unChemin,$part[0],$part[1]);
        }

        /*foreach($listFiles as $file)
        {
            $part = explode('.', trim($file, '.'));
        }

        $this->ajouterFichier($unChemin,$unNom,$unType);*/
    }

    /**
     * @param $chemin
     * @param $nom
     * @param $type
     */
    public function ajouterFichier($chemin,$nom,$type)
    {
        $unFichier = new fichier($chemin,$nom,$type);
        $this->lesFichiers->append($unFichier);
    }

    /** Retourne l'objet d'un fichier rechercher à partir du chemin en paramètre
     * @param $chemin
     * @return
     */
    public function getFichier($chemin)
    {
        foreach($this->lesFichiers as $unFichier)
        {
            if($unFichier->getChemin() == $chemin)
            {
                return $unFichier;
            }
        }
    }

    /** Retourne le nom du fichier rechercher à partir du chemin à partir du chemin
     * @param $chemin
     * @return
     */
    public function getNomFichier($chemin)
    {
        foreach($this->lesFichiers as $unFichier)
        {
            if($unFichier->getChemin() == $chemin)
            {
                return $unFichier->getNom();
            }
        }
    }

    /** Retourne le type du fichier rechercher à partir du chemin à partir du chemin
     * @param $chemin
     * @return
     */
    public function getTypeFichier($chemin)
    {
        foreach($this->lesFichiers as $unFichier)
        {
            if($unFichier->getChemin() == $chemin)
            {
                return $unFichier->getType();
            }
        }
    }

    /**
     * @return
     */
    public function listeLesFichiers()
    {
        $liste ='';
        foreach($this->lesFichiers as $unFichier)
        {
            $sonChemin = $unFichier->getChemin();
            $sonNom = $unFichier->getNom();
            $sonType = $unFichier->getType();
            $liste = $liste.'Chemin : '.$sonChemin.' | Nom : '.$sonNom.' | Type '.$sonType.'<br>';
        }
        return $liste;
    }

}
?>