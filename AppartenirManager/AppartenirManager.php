<?php

namespace AppartenirManager;

use Appartenir\Appartenir;
use DbConnexion\DbConnexion;

class AppartenirManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        $this->pdo = $dbConnexion->getPDO();
    }


    public function CreerAppartenir(Appartenir $Appartenir): bool
    {
        $sql = "INSERT INTO tdl_appartenir (Id_tache, Id_categorie) VALUES (:ID_TACHE, :ID_CATEGORIE)";

        $statement = $this->pdo->prepare($sql);

        $retour = $statement->execute([
            ':ID_TACHE' => $Appartenir->getId_tache(),
            ':ID_CATEGORIE' => $Appartenir->getId_categorie()
        ]);

        return $retour;
    }
}
