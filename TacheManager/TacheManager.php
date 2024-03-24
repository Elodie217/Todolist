<?php

namespace TacheManager;


use DbConnexion\DbConnexion;
use PDO;
use PDOException;
use Tache\Tache;

class TacheManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        $this->pdo = $dbConnexion->getPDO();
    }



    public function CreerTache(Tache $Tache)
    {

        $Titre = $Tache->getTitre();
        $Description = $Tache->getDescription();
        $Date = $Tache->getDate();
        $Id_user = $Tache->getId_user();
        $Id_priorite = $Tache->getId_priorite();

        $sql = "INSERT INTO tdl_tache VALUES(NULL, :titre, :description, :date, :idUser, :idPriorite)";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':titre', $Titre);
        $statement->bindParam(':description', $Description);
        $statement->bindParam(':date', $Date);
        $statement->bindParam(':idUser', $Id_user);
        $statement->bindParam(':idPriorite', $Id_priorite);

        $statement->execute();

        // Récupérer l'ID de la dernière tâche insérée
        $lastInsertedId = $this->pdo->lastInsertId();

        return $lastInsertedId;
    }

    public function getTachebyIdUser()
    {
        session_start();

        $idUSer = $_SESSION['connecté'];

        $sql = "SELECT tdl_tache.Id_tache, tdl_tache.Titre, tdl_tache.Description, tdl_tache.Date, tdl_tache.Id_user, tdl_tache.Id_priorite, GROUP_CONCAT(tdl_appartenir.Id_categorie) AS Id_categorie FROM `tdl_tache` INNER JOIN tdl_appartenir on tdl_tache.Id_tache = tdl_appartenir.Id_tache WHERE Id_user = :Id_user GROUP BY tdl_tache.Id_tache";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':Id_user', $idUSer);

        $statement->execute();

        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Tache::class);

        return $retour;
    }




    public function deleteTache($id)
    {
        try {
            $sql = "DELETE FROM tdl_appartenir WHERE id_tache = :ID;
            DELETE FROM tdl_tache WHERE Id_tache = :ID;";

            $statement = $this->pdo->prepare($sql);

            return $statement->execute([':ID' => $id]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }




    public function updateTache(Tache $tache): bool
    {
        $sql = "UPDATE tdl_tache 
            SET
              Titre = :Titre,
              Description =  :Description,
              Date = :Date,
              Id_user = :Id_user,
              Id_priorite = :Id_priorite,
            WHERE Id_tache = :Id_tache";

        $statement = $this->pdo->prepare($sql);

        $retour = $statement->execute([
            ':Id_tache' => $tache->getId_tache(),
            ':Titre' => $tache->getTitre(),
            ':Description' => $tache->getDescription(),
            ':Date' => $tache->getDate(),
            ':Id_user' => $tache->getId_user(),
            ':Id_priorite' => $tache->getId_priorite(),
        ]);

        return $retour;
    }
}
