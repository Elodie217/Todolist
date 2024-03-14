<?php
if (!isset($_SESSION['connecté'])) {
    header('location: connexion.php');
    die;
}
