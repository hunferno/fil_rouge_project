<?php

//AGIR EN FONCTION DES ACTIONS
switch ($action) {
    case 'FormAjoutLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        $vue = 'livres/ajouter_livre';
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
    case 'modifierLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR MODIFIER LIVRE
        $dataFromDB = afficherTousLesLivres();
        break;
    case 'supprimerLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR SUPPRIMER LIVRE
        supprimerLivre($_GET['id']);
        //UTILISATION DE LE FONCTION POUR AFFICHER LES LIVRES
        $dataFromDB = afficherTousLesLivres();
        //AFFICHER LA PAGE DES LIVRES
        $vue = 'views/livres/tous_les_livres';
        break;

    default:
        # code...
        break;
}
