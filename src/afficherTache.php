<?php

require_once __DIR__ . '/../autoload.php';

use DbConnexion\DbConnexion;
use TacheManager\TacheManager;

$data = file_get_contents("php://input");

$dbConnexion = new DbConnexion();
$tacheManager = new TacheManager($dbConnexion);



$taches = $tacheManager->getTachebyIdUser();

$tacheArray = [];

foreach ($taches as $tache) {
    array_push($tacheArray, $tache->getObjectToArray());
}

// echo $tacheManager->getTachebyIdUser();
echo json_encode($tacheArray);
// echo json_encode($tacheManager->getTachebyIdUser());
