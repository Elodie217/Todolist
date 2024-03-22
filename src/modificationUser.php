 <?php

    require_once __DIR__ . '/../autoload.php';

    use DbConnexion\DbConnexion;
    use User\User;
    use UserManager\UserManager;


    if (isset($_POST)) {
        $data = file_get_contents("php://input");
        $userModification = (json_decode($data, true));


        if (isset($userModification['nom']) && !empty($userModification['nom']) && isset($userModification['prenom']) && !empty($userModification['prenom']) && isset($userModification['email']) && !empty($userModification['email'])) {


            $dbConnexion = new DbConnexion();
            $userManager = new UserManager($dbConnexion);


            $nomUser = htmlspecialchars($userModification['nom']);
            $prenomUser = htmlspecialchars($userModification['prenom']);


            if (filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
                $emailUser = htmlspecialchars($userModification['email']);
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
                echo TRUE;
            } else {
                echo "Email déjà utilisé";
            }
        } else {
            echo 'Merci de remplir tous les champs.';
        }
    } else {
        echo 'Merci de remplir tous les champs.';
    }

    ?>