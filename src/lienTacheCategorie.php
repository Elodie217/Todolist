<?php

use Appartenir\Appartenir;
use AppartenirManager\AppartenirManager;
use DbConnexion\DbConnexion;

require_once __DIR__ . '/../autoload.php';


if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $lienAppartenir = (json_decode($data, true));

    $dbConnexion = new DbConnexion();
    $appartenirManager = new AppartenirManager($dbConnexion);

    $idTache = htmlspecialchars($lienAppartenir['idTache']);
    $idCategories = str_split(htmlspecialchars($lienAppartenir['categorieTache']));

    foreach ($idCategories as $idCategorie) {
        // Création lien

        $infoAppartenir = array(
            "Id_tache" => $idTache,
            "Id_categorie" => $idCategorie
        );

        $newAppartenir = new Appartenir($infoAppartenir);


        if ($appartenirManager->CreerAppartenir($newAppartenir)) {
            echo "liencréer";
        } else {
            echo "Erreur création lien";
        }
    }
} else {
    echo 'Merci de remplir tous les champs.';
}
