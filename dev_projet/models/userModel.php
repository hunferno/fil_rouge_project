<?php

//APPEL DE LA DAO POUR LES REQUETES SQL
require 'clientActions/dbConnection.php';

function connexion()
{
    //UTLISATION DES VARIABLES GLOBALES
    global $vue;
    global $erreur;
    global $email;

    //RECUPERATION DES DONNEES DU FORMULAIRE
    $client = [
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)
    ];

    try {

        //AFFECTATION DU RETURN DE LA FONCTION A UNE VARIABLE
        $dataFromResponse = userConnection($client);
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
                //Boite alert
                $erreur = '<div class="alert alert-danger" role="alert">
                        Mot de passe incorrect</div>';
                $vue = 'connexionMain';
            }
        } else {
            //PAGE INFORMATION DE REDIRECTION VERS LE SITE UTILISATEUR
            $vue = 'erreurs/redirect_userWebsite';
        }
    } catch (Exception $error) {
        //Boite alert SI EMAIL INEXISTANT
        $erreur = '<div class="alert alert-danger" role="alert">' . $error->getMessage() . '</div>';
        $vue = 'connexionMain';
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
    global $erreur;

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

    try {
        // APPEL DE LA FONCTION ajouterUser
        ajouterUser($user);
        //DEPLACER L'IMAGE DANS LE BON DOSSIER DES USERS
        switch ($_POST['categorie']) {
            case '2':
                move_uploaded_file($_FILES['photo_user']['tmp_name'], 'asset/images/users/eleves/' . $nom_photo_user);
                break;
            case '3':
                move_uploaded_file($_FILES['photo_user']['tmp_name'], 'asset/images/users/profs/' . $nom_photo_user);
                break;
        }
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function afficherTousLesUsers()
{
    try {
        //REQUETE SQL POUR OBTENIR TOUS LES LIVRES
        $dataFromDB = afficherUsers();
        return $dataFromDB;
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}
