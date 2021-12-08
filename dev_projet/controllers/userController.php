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

    default:
        # code...
        break;
}
