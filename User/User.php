<?php

namespace User;


class User
{

    private $Id_user;
    private $Nom;
    private $Prenom;
    private $Email;
    private $Mot_de_passe;


    function __construct(array $datas = array())
    {
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
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
     *
     * @return  self
     */
    public function setId_user($Id_user)
    {
        $this->Id_user = $Id_user;

        return $this;
    }

    /**
     * Get the value of Nom
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set the value of Nom
     *
     * @return  self
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * Get the value of Prenom
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @return  self
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * Get the value of Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Mot_de_passe
     */
    public function getMot_de_passe()
    {
        return $this->Mot_de_passe;
    }

    /**
     * Set the value of Mot_de_passe
     *
     * @return  self
     */
    public function setMot_de_passe($Mot_de_passe)
    {
        $this->Mot_de_passe = $Mot_de_passe;

        return $this;
    }

    //////////////////////////////////////////////////////
    public function getObjectToArray(): array
    {
        return ['Id_user' => $this->getId_user(), 'Nom' => $this->getNom(), 'Prenom' => $this->getPrenom(), 'Email' => $this->getEmail(), 'Mot_de_passe' => $this->getMot_de_passe()];
    }
}
