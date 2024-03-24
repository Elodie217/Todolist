<?php

namespace UserManager;


use DbConnexion\DbConnexion;
use PDO;
use PDOException;
use User\User;

class UserManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupére la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }


    public function creerUser(User $user)
    {
        $name = $user->getNom();
        $prenom = $user->getPrenom();
        $email = $user->getEmail();
        $password = $user->getMot_de_passe();

        // try {
        $stmt = $this->pdo->prepare("INSERT INTO tdl_user VALUES(NULL,?,?,?,?)");

        $stmt->execute([$name, $prenom, $email, $password]);

        return $stmt->rowCount() == 1;
        // } 
        // catch (\PDOException $e) {
        //     echo 'Email déjà utilisé';
        // }
    }




    public function login(string $email, string $password)
    {

        $sql = "SELECT * FROM tdl_user WHERE EMAIL = :email";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User\User');
        $user = $statement->fetch();

        if ($user) {
            if (password_verify($password, $user->getMot_de_passe())) {
                return $statement->rowCount() == 1;
            } else {
                return false;
            }
        } else {
            return false;
        }




        // $sql = "SELECT * FROM tdl_user WHERE EMAIL = :email";

        // $statement = $this->pdo->prepare($sql);
        // $statement->bindParam(':email', $email);
        // $statement->execute();
        // $statement->setFetchMode(PDO::FETCH_CLASS, 'User\User');
        // $user = $statement->fetch();

        // if (password_verify($password, $user->getMot_de_passe())) {
        //     return $statement->rowCount() == 1;
        // }


    }




    public function getUserbyEmail(string $email): User|bool
    {
        $sql = "SELECT * FROM tdl_user WHERE Email = :email";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User\User');
        $retour = $statement->fetch();

        return $retour;
    }

    public function getUserbyId(string $IdUser): User|bool
    {
        $sql = "SELECT * FROM tdl_user WHERE Id_user = :IdUser";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':IdUser', $IdUser);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User\User');
        $retour = $statement->fetch();

        return $retour;
    }


    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM tdl_tache WHERE Id_user = :ID;
            DELETE FROM tdl_user WHERE Id_user = :ID;";

            $statement = $this->pdo->prepare($sql);

            return $statement->execute([':ID' => $id]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }




    public function updateUser(User $user): bool
    {
        session_start();

        $sql = "UPDATE tdl_user 
            SET
              Nom = :Nom,
              Prenom =  :Prenom,
              Email = :Email
            WHERE Id_user = :Id_user";

        $statement = $this->pdo->prepare($sql);

        $retour = $statement->execute([
            ':Id_user' => $_SESSION['connecté'],
            ':Nom' => $user->getNom(),
            ':Prenom' => $user->getPrenom(),
            ':Email' => $user->getEmail(),
        ]);

        return $retour;
    }
}
