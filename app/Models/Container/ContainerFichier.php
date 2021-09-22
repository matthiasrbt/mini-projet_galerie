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

        for($i = 2; $i < sizeof($listFiles); $i++)
        {
            $part =  explode('.', trim($listFiles[$i],'.'));
            $unChemin = "../tmp/".$listFiles[$i];
            $this->ajouterFichier($unChemin,$part[0],$part[1]);
        }
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

    /** Retourne le type du fichier rechercher à partir du chemin à partir du chemin
     * @param $type
     * @return
     */
    public function listeLesFichiersD1Type($type)
    {
        $liste ='';
        foreach($this->lesFichiers as $unFichier)
        {
            if($unFichier->getType() == $type)
            {
                $liste = $liste . 'Chemin : ' . $unFichier->getChemin() . ' | Nom : ' . $unFichier->getNom() . ' | Type ' . $unFichier->getType() . '<br>';
            }
        }
        return $liste;
    }

    public function listeLesFichiersParType()
    {
        $vretour = array();
        //Insert les image dans le tableau
        foreach($this->lesFichiers as $unFichier)
        {
            if($unFichier->getType() == "jpg")
            {
                $vretour[] = array('chemin'=>$unFichier->getChemin(),'nom'=>$unFichier->getNom(),'type'=>$unFichier->getType());
            }
        }
        //Insert les vidéos dans le tableau
        foreach($this->lesFichiers as $unFichier)
        {
            if($unFichier->getType() == "mp4")
            {
                $vretour[] = array('chemin'=>$unFichier->getChemin(),'nom'=>$unFichier->getNom(),'type'=>$unFichier->getType());
            }
        }
        //Insert les pdf dans le tableau
        foreach($this->lesFichiers as $unFichier)
        {
            if($unFichier->getType() == "pdf")
            {
                $vretour[] = array('chemin'=>$unFichier->getChemin(),'nom'=>$unFichier->getNom(),'type'=>$unFichier->getType());
            }
        }
        return $vretour;//Retourne le tableau contenant les éléments du dossier trier alphabétiuement pas type
    }



}
?>