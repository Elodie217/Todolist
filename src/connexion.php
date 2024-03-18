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
            echo 'email invalide';
        }



        if ($userManager->login($email, $user["passwordConnexion"])) {
            echo "success";
            // faire une session avec l'id de l'utilisateur
            $_SESSION['connecté'] = $email;
            // header('Content-Type: application/json');
            // $data = json_encode(['connexion' => CONNEXION_REUSSITE]);
            // echo 'location:../index.php?success=' . CONNEXION_REUSSITE;
            // echo $data;
        } else {
            echo "Erreur de connexion";
        }
    } else {
        echo 'Merci de remplir tous les champs.';
    }
}
