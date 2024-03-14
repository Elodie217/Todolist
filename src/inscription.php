 <?php

    require_once __DIR__ . '/../autoload.php';

    use DbConnexion\DbConnexion;
    use User\User;
    use UserManager\UserManager;


    if (isset($_POST)) {
        if (isset($user['nom']) && !empty($user['nom']) && isset($user['prenom']) && !empty($user['prenom']) && isset($user['email']) && !empty($user['email']) && isset($user['password']) && !empty($user['password']) && isset($user['password2']) && !empty($user['password2'])) {



            $data = file_get_contents("php://input");
            $user = (json_decode($data, true));


            $dbConnexion = new DbConnexion();
            $userManager = new UserManager($dbConnexion);


            $nomUser = htmlspecialchars($user['nom']);
            $prenomUser = htmlspecialchars($user['prenom']);


            if (filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
                $emailUser = htmlspecialchars($user['email']);
            } else {
                header('location:../index.php?erreur=' . ERREUR_EMAIL);
            }

            if (strlen($user["password"]) > 7 && strlen($user["password2"]) > 7) {
                if ($user["password"] == $user["password2"]) {
                    $passwordUser = password_hash($user["password"], PASSWORD_DEFAULT);
                    $password2 = password_hash($user["password2"], PASSWORD_DEFAULT);
                } else {
                    header('location:../index.php?erreur=' . ERREUR_PASSWORD_IDENTIQUE);
                }
            } else {
                header('location:../index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
            }

            $infoUser = array(
                "Nom" => $nomUser,
                "Prenom" => $prenomUser,
                "Email" => $emailUser,
                'Mot_de_passe' => $passwordUser
            );


            $newUser = new User($infoUser);


            if ($userManager->creerUser($newUser)) {
                echo "success";
                header('location:../index.php?success=' . INSCRIPTION_REUSSITE);
            } else {
                echo "didn't work";
                header('location:../index.php?erreur=' . ERREUR_ENREGISTREMENT);
            }
        } else {
            header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
        }
    } else {
        header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
    }

    ?>