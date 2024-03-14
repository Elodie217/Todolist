<?php

namespace UserManager;

use DbConnexion\DbConnexion;
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
        try {
            $stmt = $this->pdo->query("SELECT * FROM user WHERE email_user = '$email'");
        } catch (\PDOException $e) {
            var_dump($e);
        }
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $user = new User($row);
        }

        if (password_verify($user->getMDP(), $password)) {
            return $stmt->rowCount() == 1;
        }
    }
}
