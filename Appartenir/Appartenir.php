<?php

namespace Appartenir;


class Appartenir
{

    private $Id_tache;
    private $Id_categorie;

    function __construct(array $datas)
    {
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }



    /**
     * Get the value of Id_tache
     */
    public function getId_tache()
    {
        return $this->Id_tache;
    }

    /**
     * Set the value of Id_tache
     */
    public function setId_tache($Id_tache): self
    {
        $this->Id_tache = $Id_tache;

        return $this;
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
    public function setId_categorie($Id_categorie): self
    {
        $this->Id_categorie = $Id_categorie;

        return $this;
    }
}
