<?php

namespace Tache;

class Tache
{
    private $Id_tache;
    private $Titre;
    private $Description;
    private $Date;
    private $Id_user;
    private $Id_priorite;
    private $Id_categorie;

    function __construct(array $datas = [])
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
    public function setId_tache($Id_tache)
    {
        $this->Id_tache = $Id_tache;

        return $this;
    }

    /**
     * Get the value of Titre
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * Set the value of Titre
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;

        return $this;
    }

    /**
     * Get the value of Description
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * Get the value of Date
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * Get the value of Id_user
     */
    public function getId_user()
    {
        return $this->Id_user;
    }

    /**
     * Set the value of Id_user
     */
    public function setId_user($Id_user)
    {
        $this->Id_user = $Id_user;

        return $this;
    }

    /**
     * Get the value of Id_priorite
     */
    public function getId_priorite()
    {
        return $this->Id_priorite;
    }

    /**
     * Set the value of Id_priorite
     */
    public function setId_priorite($Id_priorite)
    {
        $this->Id_priorite = $Id_priorite;

        return $this;
    }
    public function getObjectToArray(): array
    {
        return ['Id_tache' => $this->getId_tache(), 'Titre' => $this->getTitre(), 'Description' => $this->getDescription(), 'Date' => $this->getDate(), 'Id_user' => $this->getId_user(), 'Id_priorite' => $this->getId_priorite(), 'Id_categorie' => $this->getId_categorie()];
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
