<?php
//OUVERTURE DE LA SESSION
session_start();
//DECLARATION DES VARIABLES
$erreur = '';
$vue = '';
// $email;
if (empty($_SESSION)) {
    $email = '';
} else {
    $email = $_SESSION['userEmail'];
}

// var_dump($vue, $email);
// die();

if (empty($_GET)) {
    $entite = '';
    $action = 'home';
} else {
    $entite = $_GET['entite'];
    $action = $_GET['action'];
}

//AGIR EN FONCTION DES ENTITES
switch ($entite) {
        //SI ENTITE = USER
    case 'user':
        //APPEL DU CONTROLLEUR EN CHARGE DES USERS
        require 'controllers/userController.php';
        break;

        //SI ENTITE = LIVRE
    case 'livre':
        //APPEL DU CONTROLLEUR EN CHARGE DES LIVRES
        require 'controllers/livreController.php';
        break;

        //SI ENTITE = REDIRECTION
    case 'redirection':
        //APPEL DU CONTROLLEUR EN CHARGE DES REDIRECTIONS
        require 'controllers/redirectionController.php';
        break;
    default:
        $vue = 'connexionMain';
        break;
}
require('views/templateView.php');
