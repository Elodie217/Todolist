<?php

namespace AppartenirManager;

use Appartenir\Appartenir;
use DbConnexion\DbConnexion;
use PDOException;

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

    public function deleteAppartenir($id)
    {
        try {
            $sql = "DELETE FROM tdl_appartenir WHERE id_tache = :ID;";

            $statement = $this->pdo->prepare($sql);

            return $statement->execute([':ID' => $id]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}
