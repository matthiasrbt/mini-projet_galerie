<?php
namespace Models;


class fichier
{
    var $chemin ;
    var $nom;
    var $type;

    /**
     * fichier constructor.
     * @param $chemin
     * @param $nom
     * @param $type
     */
    public function __construct($chemin, $nom, $type)
    {
        $this->chemin = $chemin;
        $this->nom = $nom;
        $this->type = $type;
    }


    /**
     * @return mixed
     */
    public function getChemin()
    {
        return $this->chemin;
    }

    /**
     * @param mixed $chemin
     */
    public function setChemin($chemin): void
    {
        $this->chemin = $chemin;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }



}