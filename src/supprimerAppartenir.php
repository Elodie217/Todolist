 <?php

    require_once __DIR__ . '/../autoload.php';
    require_once __DIR__ . '/../config.php';

    use AppartenirManager\AppartenirManager;
    use DbConnexion\DbConnexion;

    if (isset($_POST)) {
        $data = file_get_contents("php://input");
        $tache = (json_decode($data, true));

        $dbConnexion = new DbConnexion();
        $appartenirManager = new AppartenirManager($dbConnexion);

        var_dump($tache);

        if ($appartenirManager->deleteAppartenir($tache['idTache'])) {
            echo true;
        } else {
            echo false;
        }
    } else {
        echo 'Erreur';
    }
