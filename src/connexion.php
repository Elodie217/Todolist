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
            $DbConnexion = new DbConnexion();
            $UserManager = new UserManager($DbConnexion);
            $utilisateur = $UserManager->getUserbyEmail($email);
            $idUser = $utilisateur->getId_user();
            $_SESSION['connecté'] = $idUser;

            $nomUser = $utilisateur->getNom();
            $prenomUser = $utilisateur->getPrenom();
            $emailUser = $utilisateur->getEmail();


            $arrUser = array('NomUser' => $nomUser, 'PrenomUser' => $prenomUser, 'EmailUser' => $emailUser);
            echo json_encode($arrUser);
        } else {
            echo 'FALSE';
        }
    } else {
        echo 'Merci de remplir tous les champs.';
    }
}
