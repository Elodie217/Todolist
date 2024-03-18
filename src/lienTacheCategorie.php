<?php

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

        $userManager = new UserManager($dbConnexion);
        $utilisateur = $userManager->getUserbyEmail($_SESSION['connecté']);

        $idUtilisateur = $utilisateur->getId_user();

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


        if ($tacheManager->CreerTache($newTache)) {
            echo "tachecréer";
        } else {
            echo "Erreur création";
        }


        // Création lien tache-categorie (appartenir)

        //Là tu créer un tableau dans lequel il y a les id des catégories choisi et tu fais un foreach


        $infoAppartenir = array(
            "Id_tache" => $titreTache,
            "Id_categorie" => $descriptionTache
        );

        $newLienAppartenir = new Appartenir($infoAppartenir);
        $AppartenirManager = new AppartenirManager($dbConnexion);

        if ($AppartenirManager->CreerAppartenir($newLienAppartenir)) {
            echo "Lien créer";
        } else {
            echo "Erreur création";
        }
    } else {
        echo 'Merci de remplir tous les champs.';
    }
} else {
    echo 'Merci de remplir tous les champs.';
}
