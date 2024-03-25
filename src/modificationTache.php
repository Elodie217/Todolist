<?php

session_start();


use DbConnexion\DbConnexion;
use Tache\Tache;
use TacheManager\TacheManager;


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


        if ($tache['priorite'] == 'normal') {
            $prioriteTache = 1;
        } else if ($tache['priorite'] == 'important') {
            $prioriteTache = 2;
        } else if ($tache['priorite'] == 'urgent') {
            $prioriteTache = 3;
        }

        $id = $tache['id'];

        // Création tache

        $infoTache = array(
            'Id_tache' => $id,
            "Titre" => $titreTache,
            "Description" => $descriptionTache,
            "Date" => $dateTache,
            'Id_priorite' => $prioriteTache
        );

        $TacheModifiee = new Tache($infoTache);

        $ModifierTache = $tacheManager->updateTache($TacheModifiee);
        echo $ModifierTache;
    } else {
        echo 'Merci de remplir tous les champs.';
    }
} else {
    echo 'Merci de remplir tous les champs.';
}
