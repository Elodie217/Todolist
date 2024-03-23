 <?php

    require_once __DIR__ . '/../autoload.php';
    require_once __DIR__ . '/../config.php';


    use DbConnexion\DbConnexion;
    use TacheManager\TacheManager;

    if (isset($_POST)) {
        $data = file_get_contents("php://input");
        $tache = (json_decode($data, true));

        $dbConnexion = new DbConnexion();
        $tacheManager = new TacheManager($dbConnexion);


        if ($tacheManager->deleteTache($tache['idTache'])) {
            echo true;
        } else {
            echo false;
        }
    } else {
        echo 'Erreur';
    }
