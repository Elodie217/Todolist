<?php

namespace Categorie;


class Categorie
{

    private $Id_categorie;
    private $Nom_categorie;

    function __construct(array $datas = array())
    {
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Get the value of Id_categorie
     */
    public function getId_categorie()
    {
        return $this->Id_categorie;
    }

    /**
     * Set the value of Id_categorie
     */
    public function setId_categorie($Id_categorie)
    {
        $this->Id_categorie = $Id_categorie;

        return $this;
    }

    /**
     * Get the value of Nom_categorie
     */
    public function getNom_categorie()
    {
        return $this->Nom_categorie;
    }

    /**
     * Set the value of Nom_categorie
     */
    public function setNom_categorie($Nom_categorie)
    {
        $this->Nom_categorie = $Nom_categorie;

        return $this;
    }
}
