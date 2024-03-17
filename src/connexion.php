<?php

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config.php';


use DbConnexion\DbConnexion;
use User\User;
use UserManager\UserManager;



session_start();



if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));

    if (isset($user['emailConnexion']) && !empty($user['emailConnexion']) && isset($user['passwordConnexion']) && !empty($user['passwordConnexion'])) {


        $dbConnexion = new DbConnexion();
        $userManager = new UserManager($dbConnexion);

        if (filter_var($user['emailConnexion'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($user['emailConnexion']);
        } else {
            header('location:../index.php?erreur=' . ERREUR_EMAIL);
        }



        if ($userManager->login($email, $user["passwordConnexion"])) {
            // echo "success";
            // faire une session avec l'id de l'utilisateur
            // $_SESSION['connecté'] = $email;
            header('Content-Type: application/json');
            // echo 'location:../index.php?success=' . CONNEXION_REUSSITE;
            $data = json_encode(['connexion' => CONNEXION_REUSSITE]);
            // echo $data;
        } else {
            echo "didn't work";
            header('location:../index.php?erreur=' . ERREUR_CONNEXION);
        }
    } else {
        header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
    }
}
