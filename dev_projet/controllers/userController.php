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

    case 'FormModifUser':
        //CREATION DES VARIABLES UTILES A LA PAGE
        $nom = $_GET['nom_user'];
        $prenom = $_GET['prenom_user'];
        $id_user = $_GET['uniqueId_user'];
        //UTILISATION DE LE FONCTION POUR DECONNECTER USER
        $vue = 'views/users/modifer_user';
        break;

    case 'ajouter_user':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER USER
        ajouterUnUser();
        $vue = 'views/users/ajouter_user';
        break;

    case 'modifier_user':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //UTILISATION DE LE FONCTION POUR DECONNECTER USER
        modifierUnUser($_GET['id']);
        //RETOUR A LA PAGE TOUS LES USERS
        $dataFromDB = afficherTousLesUsers();
        $vue = 'views/users/tous_les_users';
        break;

    case 'afficherTousLesUsers':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //APPEL DE LA FONCTION D'AFFICHAGE DES USERS
        $dataFromDB = afficherTousLesUsers();
        $vue = 'views/users/tous_les_users';
        break;

    case 'supprimerUser':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/userModel.php';
        //CREATION DES VARIABLES
        $id = $_GET['id'];
        $categorie = $_GET['categorie'];
        $imagePath = $_GET['imagePath'];
        //APPEL DE LA FONCTION DE SUPPRESSION USER
        supprimerUnUser($id, $categorie, $imagePath);
        //RETOUR A LA PAGE TOUS LES USERS
        $dataFromDB = afficherTousLesUsers();
        $vue = 'views/users/tous_les_users';
        break;

    default:
        # code...
        break;
}
