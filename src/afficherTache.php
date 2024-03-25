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

echo json_encode($tacheArray);
