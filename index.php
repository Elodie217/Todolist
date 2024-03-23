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

<body class="text-lg relative bg-[url('./asset/media/bureau.jpg')] bg-cover bg-fixed bg-center relative " style="font-family: sans-serif ;">


    <div class="divAccueil <?php if (isset($_SESSION['connecté'])) {
                                echo 'hidden';
                            }; ?> "><?php include 'includes/Accueil.php' ?></div>


    <div class="divInscription hidden">
        <?php include 'includes/Inscription.php'; ?>
    </div>

    <div class="divConnexion hidden">
        <?php
        include 'includes/Connexion.php';
        ?>
    </div>


    <section class="divToDoList <?php if (isset($_SESSION['connecté'])) {
                                    echo '';
                                } else {
                                    echo 'hidden';
                                }; ?>  ">
        <?php include __DIR__ . "/includes/Todolist.php"; ?>
    </section>



    <div class="ModificationReussite absolute z-20 mx-[530px] w-72 top-[50vh] bg-lime-200 border-2 border-lime-500 rounded-2xl py-2 text-center text-xl hidden">Modification réussite !</div>

    <div class="ValidationReussite absolute z-20 mx-[530px] w-72 top-[50vh] bg-lime-200 border-2 border-lime-500 rounded-2xl py-2 text-center text-xl hidden">Tache terminée !</div>

    <div class="SuppressionReussite absolute z-20 mx-[530px] w-72 top-[50vh] bg-lime-200 border-2 border-lime-500 rounded-2xl py-2 text-center text-xl hidden">Compte supprimé</div>


    <div class="divValiderTache absolute z-20 mx-[500px] w-96 top-[40vh] border-2 bg-[#DFE0DF]/[.8] border-black-500 rounded-2xl py-2 text-center p-4 hidden">
        <p class="mb-2 font-semibold text-xl">Voulez-vous marquer cette tache commme validée ?</p>
        <div class="divBoutton"> <button class="bg-[#FFF8E8]/[.9] p-2 m-2 rounded-xl text-xl" onclick="validerTache()">Oui</button> <button class=" bg-[#FFF8E8]/[.9] p-2 m-2 rounded-xl text-xl" onclick="retourTache()">Non</button> </div>
    </div>

    <div class="flou fixed w-full h-full top-0 backdrop-blur-sm hidden"></div>

</body>
<script src="script.js"></script>

<?php if (isset($_SESSION['connecté'])) {
    $NomUser = $utilisateur->getNom();
    $PrenomUser = $utilisateur->getPrenom();
    $EmailUser = $utilisateur->getEmail();
?>
    <script>
        afficherTodo('<?= $NomUser ?>', '<?= $PrenomUser ?>');
        afficherModification('<?= $NomUser ?>', '<?= $PrenomUser ?>', '<?= $EmailUser ?>');
        recupererTaches();
    </script>
<?php
} ?>
<script src="https://cdn.tailwindcss.com"></script>

<script src="https://kit.fontawesome.com/97cd5da9a0.js" crossorigin="anonymous"></script>

</html>