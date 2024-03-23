 <?php

    require_once __DIR__ . '/../autoload.php';

    use DbConnexion\DbConnexion;
    use User\User;
    use UserManager\UserManager;


    if (isset($_POST)) {
        $data = file_get_contents("php://input");
        $userModification = (json_decode($data, true));
        var_dump($userModification);

        if (isset($userModification['nomModification']) && !empty($userModification['nomModification']) && isset($userModification['prenomModification']) && !empty($userModification['prenomModification']) && isset($userModification['emailModification']) && !empty($userModification['emailModification'])) {


            $dbConnexion = new DbConnexion();
            $userManager = new UserManager($dbConnexion);


            $nomUser = htmlspecialchars($userModification['nomModification']);
            $prenomUser = htmlspecialchars($userModification['prenomModification']);


            if (filter_var($userModification['emailModification'], FILTER_VALIDATE_EMAIL)) {
                $emailUser = htmlspecialchars($userModification['emailModification']);
            } else {
                echo 'Email invalide';
            }

            $infoUser = array(
                "Nom" => $nomUser,
                "Prenom" => $prenomUser,
                "Email" => $emailUser,
            );


            $newUser = new User($infoUser);


            if ($userManager->updateUser($newUser)) {

                $nomUser = $newUser->getNom();
                $prenomUser = $newUser->getPrenom();
                $emailUser = $newUser->getEmail();

                $arrUser = array('NomUser' => $nomUser, 'PrenomUser' => $prenomUser, 'EmailUser' => $emailUser);
                echo json_encode($arrUser);
            } else {
                echo FALSE;
            }
        } else {
            echo 'Merci de remplir tous les champs.';
        }
    } else {
        echo 'Merci de remplir tous les champs.';
    }

    ?>