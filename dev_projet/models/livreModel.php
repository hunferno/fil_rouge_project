<?php

//APPEL DE LA DAO POUR LES REQUETES SQL
require 'clientActions/dbConnection.php';

function ajouterUnLivre()
{
    //TEST POUR IMAGE A ENVOYER
    if (empty($_FILES['image_livre']['name'])) {
        $nom_image_livre = 'empty_book.png';
    } else {
        $info_image = pathinfo($_FILES['image_livre']['name']);
        $nom_image_livre = uniqid('livre', true) . '.' . $info_image['extension'];
    }

    $livre = [
        'titre' => filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_SPECIAL_CHARS),
        'id_theme' => filter_input(INPUT_POST, 'theme'),
        'id_auteur' => filter_input(INPUT_POST, 'auteur'),
        'id_editeur' => filter_input(INPUT_POST, 'editeur'),
        'date_parution' => filter_input(INPUT_POST, 'date_parution'),
        'disponible' => filter_input(INPUT_POST, 'dispo_livre'),
        'image_livre' => $nom_image_livre
    ];

    try {
        //APPEL DE LA FONCTION ajouterLivre
        ajouterLivre($livre);
        //DEPLACER L'IMAGE DANS LE DOSSIER DES IMAGES LIVRES
        move_uploaded_file($_FILES['image_livre']['tmp_name'], 'asset/images/livres/' . $nom_image_livre);
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function afficherTousLesLivres()
{
    try {
        //REQUETE SQL POUR OBTENIR TOUS LES LIVRES
        $dataFromDB = afficherLivres();
        return $dataFromDB;
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function modifierUnLivre($id_livre)
{
    $livre = [
        'titre' => $_POST['titre'],
        'id_theme' => $_POST['theme'],
        'id_auteur' => $_POST['auteur'],
        'id_editeur' => $_POST['editeur'],
        'date_parution' => $_POST['date_parution'],
        'disponible' => $_POST['dispo_livre']
    ];

    try {
        //APPEL DE LA FONCTION ajouterLivre
        modifierLivre($livre, $id_livre);
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function supprimerUnLivre($id_livre)
{
    try {
        supprimerLivre($id_livre);
    } catch (\Throwable $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
};
