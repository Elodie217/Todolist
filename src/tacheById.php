<?php

require_once __DIR__ . '/../autoload.php';

use DbConnexion\DbConnexion;
use TacheManager\TacheManager;

$data = file_get_contents("php://input");
$idTache = (json_decode($data, true));


$dbConnexion = new DbConnexion();
$tacheManager = new TacheManager($dbConnexion);



$recuperationTache = $tacheManager->getTachebyId($idTache['IdTache']);

$IdTache = $recuperationTache->getId_tache();
$TitreTache = $recuperationTache->getTitre();
$DescriptionTache = $recuperationTache->getDescription();
$DateTache = $recuperationTache->getDate();
$IdUserTache = $recuperationTache->getId_user();
$IdPrioriteTache = $recuperationTache->getId_priorite();
$IdCategorieTache = $recuperationTache->getId_categorie();

$arrayTache = array('IdTache' => $IdTache, 'TitreTache' => $TitreTache, 'DescriptionTache' => $DescriptionTache, 'DateTache' => $DateTache, 'IdUserTache' => $IdUserTache, 'IdPrioriteTache' => $IdPrioriteTache, 'IdCategorieTache' => $IdCategorieTache);


echo json_encode($arrayTache);
