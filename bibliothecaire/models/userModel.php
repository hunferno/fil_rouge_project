<?php

//APPEL DE LA CLASS DAOLIVRE POUR LES REQUETES SQL
require 'dbActions/DaoUser.php';

function connexion()
{
    //CREATION D'UNE CLASS DAOLIVRE
    $dbDaoUser = new DaoUser();

    //UTLISATION DES VARIABLES GLOBALES
    global $vue;
    global $email;

    //RECUPERATION DES DONNEES DU FORMULAIRE
    $client = [
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)
    ];

    //AFFECTATION DU RETURN DE LA FONCTION A UNE VARIABLE
    $dataFromResponse = $dbDaoUser->userConnection($client);
    //VERIFICATION SI USER EST ADMIN
    if ($dataFromResponse['id_categorie_user'] === "1") {
        $email = $dataFromResponse['email_user'];
        //VERIFICATION DU MDP
        $passwordVerify = password_verify($client['password'], $dataFromResponse['password_user']);

        //SI MDP BON
        if ($passwordVerify) {
            $_SESSION["userFirstName"] = $dataFromResponse["prenom_user"];
            $_SESSION["userLastName"] = $dataFromResponse["nom_user"];
            $_SESSION["userPhone"] = $dataFromResponse["telephone_user"];
            $_SESSION['userEmail'] = $dataFromResponse['email_user'];
            // header('Location:/pages/admin_dashboard/accueil.php');
            // exit();
            $vue = 'users/accueil';
        } else {
            throw new Exception('Mot de passe incorrect');
        }
    } else {
        //PAGE INFORMATION DE REDIRECTION VERS LE SITE UTILISATEUR
        $vue = 'erreurs/redirect_userWebsite';
    }
}

function deconnexion($session)
{
    global $vue;

    $session = array();
    session_destroy();

    $vue = 'connexionMain';
}

function ajouterUnUser()
{
    //CREATION D'UNE CLASS DAOLIVRE
    $dbDaoUser = new DaoUser();

    //TEST POUR IMAGE A ENVOYER
    if (empty($_FILES['photo_user']['name'])) {
        $nom_photo_user = 'empty_user.png';
    } else {
        $info_image = pathinfo($_FILES['photo_user']['name']);
        switch ($_POST['categorie']) {
            case '2':
                $nom_photo_user = uniqid('etudiant', true) . '.' . $info_image['extension'];
                break;

            case '3':
                $nom_photo_user = uniqid('prof', true) . '.' . $info_image['extension'];
                break;
        }
    }

    //RECUPERATION DES DONNEES DU FORMULAIRE
    $user = [
        'nom' => filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS),
        'prenom' => filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS),
        'adresse' => filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_SPECIAL_CHARS),
        'telephone' => filter_input(INPUT_POST, 'telephone'),
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'password' => filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_SPECIAL_CHARS),
        'confirmMDP' => filter_input(INPUT_POST, 'confirmMDP', FILTER_SANITIZE_SPECIAL_CHARS),
        'categorie' => filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS),
        'photo_user' => $nom_photo_user
    ];

    // APPEL DE LA FONCTION ajouterUser VIA LA CLASS
    $dbDaoUser->ajouterUser($user);
    //DEPLACER L'IMAGE DANS LE BON DOSSIER DES USERS
    switch ($_POST['categorie']) {
        case '2':
            move_uploaded_file($_FILES['photo_user']['tmp_name'], 'asset/images/users/eleves/' . $nom_photo_user);
            break;
        case '3':
            move_uploaded_file($_FILES['photo_user']['tmp_name'], 'asset/images/users/profs/' . $nom_photo_user);
            break;
    }
}

function afficherTousLesUsers()
{
    //CREATION D'UNE CLASS DAOLIVRE
    $dbDaoUser = new DaoUser();

    try {
        //REQUETE SQL POUR OBTENIR TOUS LES LIVRES
        $dataFromDB = $dbDaoUser->afficherUsers();
        return $dataFromDB;
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function supprimerUnUser($uniqueId, $categorie, $imagePath)
{
    //CREATION D'UNE CLASS DAOLIVRE
    $dbDaoUser = new DaoUser();

    try {
        $dbDaoUser->supprimerUser($uniqueId);
        //SUPPRIMER IMAGE STOCKEE
        if ($imagePath !== 'empty_user.png') {
            switch ($categorie) {
                case 'ETUDIANT':
                    unlink('asset/images/users/eleves/' . $imagePath);
                    break;
                case 'PROFESSEUR':
                    unlink('asset/images/users/profs/' . $imagePath);
                    break;
            }
        }
    } catch (Exception $err) {
        var_dump($err);
        exit();
    }
}

function modifierUnUser($id_user, $categorie, $path)
{
    //CREATION D'UNE CLASS DAOLIVRE
    $dbDaoUser = new DaoUser();

    //RECUPERATION DES DONNEES DU FORMULAIRE
    $user = [
        'nom' => filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS),
        'prenom' => filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS),
        // 'adresse' => filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_SPECIAL_CHARS),
        // 'telephone' => filter_input(INPUT_POST, 'telephone'),
        // 'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'password' => filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_SPECIAL_CHARS),
        'confirmMDP' => filter_input(INPUT_POST, 'confirmMDP', FILTER_SANITIZE_SPECIAL_CHARS),
        'categorie' => filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS),
        // 'photo_user' => $nom_photo_user
    ];

    $dbDaoUser->modifierUser($id_user, $user);

    //TESTER SI LA CATEGORIE A CHANGÉE
    if ($categorie !== $user['categorie']) {
        //TESTER L'ANCIENNE CATEGORIE
        switch ($categorie) {
            case '2':
                //DEPLACER PHOTO DANS LE BONS DOSSIER
                $ancien_chemin = "asset/images/users/eleves/$path";
                $new_chemin = "asset/images/users/profs/$path";
                rename($ancien_chemin, $new_chemin);
                break;
            case '3':
                //DEPLACER PHOTO DANS LE BONS DOSSIER
                $ancien_chemin = "asset/images/users/profs/$path";
                $new_chemin = "asset/images/users/eleves/$path";
                rename($ancien_chemin, $new_chemin);
                break;
        }
    }
}
