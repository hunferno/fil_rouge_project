<?php

//AGIR EN FONCTION DES ACTIONS
switch ($action) {
    case 'FormAjoutLivre':
        //APPEL DE LA VUE
        $vue = 'livres/ajouter_livre';
        break;

    case 'FormModifLivre':
        //CREATION DES VARIABLE UTILES A LA PAGE
        $titre_livre = $_GET["titre"];
        $id_livre = $_GET['id'];
        //APPEL DE LA VUE
        $vue = 'livres/modifier_livre';
        break;

    case 'ajoutLivreDb':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER LIVRE
        ajouterUnLivre();
        //AFFICHER LA VUE AJOUTER_LIVRE
        $vue = 'views/livres/ajouter_livre';
        break;

    case 'afficherTousLesLivres':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AFFICHER LES LIVRES
        $dataFromDB = afficherTousLesLivres();
        //AFFICHER LA PAGE DES LIVRES
        $vue = 'views/livres/tous_les_livres';
        break;

    case 'modifierLivreDb':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER LIVRE
        $id_livre = $_GET['id'];
        modifierUnLivre($id_livre);
        //UTILISATION DE LE FONCTION POUR AFFICHER LES LIVRES
        $dataFromDB = afficherTousLesLivres();
        //AFFICHER LA PAGE DES LIVRES
        $vue = 'views/livres/tous_les_livres';
        break;

    case 'supprimerLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR SUPPRIMER LIVRE
        supprimerUnLivre($_GET['id'], $_GET['imagePath']);
        //UTILISATION DE LE FONCTION POUR AFFICHER LES LIVRES
        $dataFromDB = afficherTousLesLivres();
        //AFFICHER LA PAGE DES LIVRES
        $vue = 'views/livres/tous_les_livres';
        break;

    default:
        # code...
        break;
}