<?php

session_start();
require_once __DIR__ . '/../autoload.php';

use DbConnexion\DbConnexion;
use UserManager\UserManager;

$data = file_get_contents("php://input");

$dbConnexion = new DbConnexion();
$userManager = new UserManager($dbConnexion);


$suppression = $userManager->deleteUser($_SESSION['connecté']);

if ($suppression) {
    echo true;
    session_destroy();
} else {
    echo false;
}
