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
        $vue = 'views/livres/ajouter_livre';
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function afficherTousLesLivres()
{
    global $vue;

    try {
        $vue = 'views/livres/tous_les_livres';
        //REQUETE SQL POUR OBTENIR TOUS LES LIVRES
        $dataFromDB = afficherLivres();
        return $dataFromDB;
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function supprimerLivre($db, $id_livre)
{

    global $vue;

    try {
        $vue = 'views/livres/tous_les_livres';
        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = "DELETE FROM livre WHERE id_livre =:id;";
        $prepareRequest = $db->prepare($dbRequest);
        //AJOUT DES VARIABLES
        $prepareRequest->bindParam(':id', $id_livre);
        //EXECUTION DE LA REQUETE
        $prepareRequest->execute();
    } catch (\Throwable $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
};
