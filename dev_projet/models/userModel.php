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
    //RECUPERATION DES DONNEES DU FORMULAIRE
    $user = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'adresse' => $_POST['adresse'],
        'telephone' => $_POST['telephone'],
        'email' => $_POST['email'],
        'password' => $_POST['mdp'],
        'confirmMDP' => $_POST['confirmMDP'],
        'date_inscription' => date("Y.m.d"),
        'categorie' => $_POST['categorie'],
    ];

    try {

        // APPEL DE LA FONCTION ajouterUser
        ajouterUser($user);
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function autre()
{
}
