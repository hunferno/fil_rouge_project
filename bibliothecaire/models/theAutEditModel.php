<?php

require 'dbActions/DaoTheAutEdit.php';

//CREATION D'UNE CLASS DAO THEME AUTEUR EDITEUR
$daoTheAutEdit = new DaoTheAutEdit();

function getAllAuteurs()
{
    global $daoTheAutEdit;

    return $daoTheAutEdit->getAuteurs();
}

function getAllEditeurs()
{
    global $daoTheAutEdit;

    return $daoTheAutEdit->getEditeurs();
}

function getAllThemes()
{
    global $daoTheAutEdit;

    return $daoTheAutEdit->getThemes();
}

function ajouterTheAutEdit()
{

    global $daoTheAutEdit;
    global $erreur;

    switch ($_POST['action']) {
        case 'theme':
            if (empty($_POST['newTheme'])) {
                $erreur = '<div class="alert alert-danger" role="alert">
                        Le champs ne peut être vide!</div>';
            } else {
                $theme = filter_input(INPUT_POST, 'newTheme');
                $daoTheAutEdit->addTheme($theme);
            }
            break;

        case 'auteur':
            if (empty($_POST['newAuteur'])) {
                $erreur = '<div class="alert alert-danger" role="alert">
                        Le champs ne peut être vide!</div>';
            } else {
                $auteur = filter_input(INPUT_POST, 'newAuteur');
                $daoTheAutEdit->addAuteur($auteur);
            }
            break;

        case 'editeur':
            if (empty($_POST['newEditeur'])) {
                $erreur = '<div class="alert alert-danger" role="alert">
                        Le champs ne peut être vide!</div>';
            } else {
                $editeur = filter_input(INPUT_POST, 'newEditeur');
                $daoTheAutEdit->addEditeur($editeur);
            }
            break;
    }
}
