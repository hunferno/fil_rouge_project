<?php

require 'Dao.php';

class DaoTheAutEdit extends Dao
{

    function getThemes()
    {
        // global $dbConnect;

        //REQUETE POUR OBTENIR LES THEMES
        $dbRequest = 'SELECT * FROM theme';
        //REPONSE NON UTILISABLE DE LA BASE DE DONNÉE
        $dbResponse = $this->dbConnect->query($dbRequest);
        //REPONSE UTILISABLE DE LA REQUETE
        $dataFromDB = $dbResponse->fetchAll();
        return $dataFromDB;
    }

    function addTheme($theme)
    {
        //VARIABLE GLOBALE
        // global $dbConnect;


        //REQUETE
        $dbRequest = 'INSERT INTO theme VALUES (NULL, :nom_theme)';
        $dbResponse = $this->dbConnect->prepare($dbRequest);

        //BIND DES VARIABLE DE LA REQUETE
        $dbResponse->bindParam(':nom_theme', $theme);

        //EXECUTE LA REQUETE
        $dbResponse->execute();
    }

    function getAuteurs()
    {
        // global $dbConnect;

        //REQUETE POUR OBTENIR LES AUTEURS
        $dbRequest = 'SELECT * FROM auteur';
        //REPONSE NON UTILISABLE DE LA BASE DE DONNÉE
        $dbResponse = $this->dbConnect->query($dbRequest);
        //REPONSE UTILISABLE DE LA REQUETE
        $dataFromDB = $dbResponse->fetchAll(PDO::FETCH_ASSOC);
        return $dataFromDB;
    }

    function addAuteur($auteur)
    {
        //VARIABLE GLOBALE
        // global $dbConnect;

        //REQUETE
        $dbRequest = 'INSERT INTO auteur VALUES (NULL, :nom_auteur)';
        $dbResponse = $this->dbConnect->prepare($dbRequest);

        //BIND DES VARIABLE DE LA REQUETE
        $dbResponse->bindParam(':nom_auteur', $auteur);

        //EXECUTE LA REQUETE
        $dbResponse->execute();
    }

    function getEditeurs()
    {
        // global $dbConnect;

        //REQUETE POUR OBTENIR LES EDITEURS
        $dbRequest = 'SELECT * FROM editeur';
        //REPONSE NON UTILISABLE DE LA BASE DE DONNÉE
        $dbResponse = $this->dbConnect->query($dbRequest);
        //REPONSE UTILISABLE DE LA REQUETE
        $dataFromDB = $dbResponse->fetchAll();
        return $dataFromDB;
    }

    function addEditeur($editeur)
    {
        //VARIABLE GLOBALE
        // global $dbConnect;

        //REQUETE
        $dbRequest = 'INSERT INTO editeur VALUES (NULL, :raison_sociale_editeur)';
        $dbResponse = $this->dbConnect->prepare($dbRequest);

        //BIND DES VARIABLE DE LA REQUETE
        $dbResponse->bindParam(':raison_sociale_editeur', $editeur);

        //EXECUTE LA REQUETE
        $dbResponse->execute();
    }
}
