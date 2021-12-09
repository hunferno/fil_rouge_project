<?php

//AGIR EN FONCTION DES ACTIONS
switch ($action) {
        //SI ACTION = CONNEXION
    case 'FormAjoutLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        $vue = 'livres/ajouter_livre';
        break;
    case 'ajoutLivreDb':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER LIVRE
        ajouterUnLivre();
        break;
    case 'afficherTousLesLivres':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER LIVRE
        $dataFromDB = afficherTousLesLivres();
        break;
    case 'modifierLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER LIVRE
        $dataFromDB = afficherTousLesLivres();
        break;
    case 'supprimerLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER LIVRE
        supprimerLivre($dbConnect, $_GET['id']);
        break;

    default:
        # code...
        break;
}
