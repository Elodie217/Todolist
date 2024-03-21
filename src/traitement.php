<?php

session_start();

use Appartenir\Appartenir;
use AppartenirManager\AppartenirManager;
use DbConnexion\DbConnexion;
use Tache\Tache;
use TacheManager\TacheManager;
use UserManager\UserManager;
use User\User;


require_once __DIR__ . '/../autoload.php';


if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $tache = (json_decode($data, true));


    if (isset($tache['titre']) && !empty($tache['titre']) && isset($tache['date']) && !empty($tache['date']) && isset($tache['priorite']) && !empty($tache['priorite'])) {


        $dbConnexion = new DbConnexion();
        $tacheManager = new TacheManager($dbConnexion);


        $titreTache = htmlspecialchars($tache['titre']);

        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

        if ($tache['date']) {
            $dateTache = htmlspecialchars($tache['date']);
        } else {
            echo "La date n'est pas valide";
        }

        $descriptionTache = htmlspecialchars($tache['description']);

        $idUtilisateur = ($_SESSION['connecté']);

        if ($tache['priorite'] == 'normal') {
            $prioriteTache = 1;
        } else if ($tache['priorite'] == 'important') {
            $prioriteTache = 2;
        } else if ($tache['priorite'] == 'urgent') {
            $prioriteTache = 3;
        }

        // Création tache

        $infoTache = array(
            "Titre" => $titreTache,
            "Description" => $descriptionTache,
            "Date" => $dateTache,
            "Id_user" => $idUtilisateur,
            'Id_priorite' => $prioriteTache
        );

        $newTache = new Tache($infoTache);

        $creerTache = $tacheManager->CreerTache($newTache);
        echo $creerTache;
    } else {
        echo 'Merci de remplir tous les champs.';
    }
} else {
    echo 'Merci de remplir tous les champs.';
}
