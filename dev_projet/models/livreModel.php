<?php

//APPEL DE LA DAO POUR LES REQUETES SQL
require 'clientActions/dbConnection.php';

function ajouterUnLivre()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //RECUPERATION DES DONNEES DU FORMULAIRE
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
}
