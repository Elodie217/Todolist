<?php
session_start();

use CategorieManager\CategorieManager;
use DbConnexion\DbConnexion;
use TacheManager\TacheManager;
use UserManager\UserManager;
use Tache\Tache;

require_once __DIR__ . './autoload.php';


if (isset($_SESSION['connecté'])) {
    $DbConnexion = new DbConnexion();
    $UserManager = new UserManager($DbConnexion);
    $utilisateur = $UserManager->getUserbyId($_SESSION['connecté']);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Madimi+One&display=swap" rel="stylesheet">
</head>
<!-- font-family: "Dancing Script", cursive; -->

<body class="text-lg relative bg-[url('./asset/media/bureau')] bg-cover bg-fixed bg-center relative" style="font-family: sans-serif ;">
    <div class="divAccueil "><?php include 'includes/Accueil.php' ?></div>


    <div class="divInscription hidden">
        <?php include 'includes/Inscription.php'; ?>
    </div>

    <div class="divConnexion hidden">
        <?php
        include 'includes/Connexion.php';
        ?>
    </div>


    <section class="divToDoList hidden ">

    </section>

    <div class="ModificationReussite absolute z-20 mx-[530px] w-72 top-[50vh] bg-lime-200 border-2 border-lime-500 rounded-2xl py-2 text-center text-xl hidden">Modification réussite !</div>

</body>
<script src="script.js"></script>

<script src="https://cdn.tailwindcss.com"></script>

<script src="https://kit.fontawesome.com/97cd5da9a0.js" crossorigin="anonymous"></script>

</html>