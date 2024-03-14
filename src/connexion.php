<?php

require_once __DIR__ . '/../autoload.php';

use DbConnexion\DbConnexion;
use User\User;
use UserManager\UserManager;



session_start();


if (isset($_POST)) {
    if (isset($user['emailConnexion']) && !empty($user['emailConnexion']) && isset($user['passwordConnexion']) && !empty($user['passwordConnexion'])) {
        $data = file_get_contents("php://input");
        $user = (json_decode($data, true));


        $dbConnexion = new DbConnexion();
        $userManager = new UserManager($dbConnexion);

        if (filter_var($user['emailConnexion'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($user['emailConnexion']);
        } else {
            header('location:../index.php?erreur=' . ERREUR_EMAIL);
        }

        $password = password_hash($user["passwordConnexion"], PASSWORD_DEFAULT);


        if ($userManager->login($email, $password)) {
            echo "success";
            // faire une session avec l'id de l'utilisateur
            $_SESSION['connecté'] = $email;
            header('location:../index.php?success=' . CONNEXION_REUSSITE);
        } else {
            echo "didn't work";
            header('location:../index.php?erreur=' . ERREUR_CONNEXION);
        }
    } else {
        header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
    }
}
