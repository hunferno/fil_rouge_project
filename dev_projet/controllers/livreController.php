<?php

//AGIR EN FONCTION DES ACTIONS
switch ($action) {
        //SI ACTION = CONNEXION
    case 'FormAjoutLivre':
        //APPEL DU MODEL POUR TRAITEMENT
        $vue = 'livres/ajouter_livre';
        break;
    case 'ajouter':
        //APPEL DU MODEL POUR TRAITEMENT
        require 'models/livreModel.php';
        //UTILISATION DE LE FONCTION POUR AJOUTER LIVRE
        ajouterUnLivre();
        break;

    default:
        # code...
        break;
}
