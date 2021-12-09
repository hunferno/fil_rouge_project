<?php

//APPEL DE LA DAO POUR LES REQUETES SQL
require 'clientActions/dbConnection.php';

function ajouterUnLivre()
{
    global $vue;

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
        ajouterLivre($livre);
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function afficherTousLesLivres()
{
    global $vue;

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
    global $vue;

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

function supprimerLivre($id_livre)
{
    global $vue;
    global $dbConnect;

    try {
        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = "DELETE FROM livre WHERE id_livre =:id;";
        $prepareRequest = $dbConnect->prepare($dbRequest);
        //AJOUT DES VARIABLES
        $prepareRequest->bindParam(':id', $id_livre);
        //EXECUTION DE LA REQUETE
        $prepareRequest->execute();
    } catch (\Throwable $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
};
