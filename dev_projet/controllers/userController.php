<?php

//AGIR EN FONCTION DES ACTIONS
switch ($action) {
        //SI ACTION = CONNEXION
    case 'connexion':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //UTILISATION DE LE FONCTION POUR CONNECTER USER
        connexion();
        break;

    case 'deconnexion':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //UTILISATION DE LE FONCTION POUR DECONNECTER USER
        deconnexion($_SESSION);
        break;

    case 'FormAjoutUser':
        //UTILISATION DE LE FONCTION POUR DECONNECTER USER
        $vue = 'views/users/ajouter_user';
        break;

    case 'ajouter_user':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //UTILISATION DE LE FONCTION POUR DECONNECTER USER
        ajouterUnUser();
        $vue = 'views/users/ajouter_user';
        break;

    case 'afficherTousLesUsers':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //APPEL DE LA FONCTION D'AFFICHAGE DES USERS
        $dataFromDB = afficherTousLesUsers();
        $vue = 'views/users/tous_les_users';
        break;

    default:
        # code...
        break;
}
