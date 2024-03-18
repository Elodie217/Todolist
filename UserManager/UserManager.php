<?php

namespace UserManager;

use DbConnexion\DbConnexion;
use PDO;
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

        try {
            $stmt = $this->pdo->prepare("INSERT INTO tdl_user VALUES(NULL,?,?,?,?)");

            $stmt->execute([$name, $prenom, $email, $password]);

            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            var_dump($e);
        }
    }




    public function login(string $email, string $password)
    {

        $sql = "SELECT * FROM tdl_user WHERE EMAIL = :email";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User\User');
        $user = $statement->fetch();

        if (password_verify($password, $user->getMot_de_passe())) {
            return $statement->rowCount() == 1;
        }
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
}
