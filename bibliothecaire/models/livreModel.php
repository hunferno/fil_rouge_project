<?php

//APPEL DE LA CLASS DAOLIVRE POUR LES REQUETES SQL
require 'dbActions/DaoLivre.php';

//CREATION D'UNE CLASS DAOLIVRE
$dbDaoLivre = new DaoLivre();

function ajouterUnLivre()
{
    //VARIABLES GLOBALES
    global $dbDaoLivre;

    //FAIRE DES ACTIONS EN FONCTION DU BTN VALIDÉ
    if ($_POST['action'] === 'livre') {
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

        //APPEL DE LA FONCTION ajouterLivre
        $dbDaoLivre->ajouterLivre($livre);
        //DEPLACER L'IMAGE DANS LE DOSSIER DES IMAGES LIVRES
        move_uploaded_file($_FILES['image_livre']['tmp_name'], 'asset/images/livres/' . $nom_image_livre);
    }
}

function afficherTousLesLivres()
{
    global $dbDaoLivre;

    try {
        return $dbDaoLivre->afficherLivres();
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function modifierUnLivre($id_livre)
{

    global $dbDaoLivre;

    //TRANSFORMER LA CHECKBOX EN BOOLEAN
    if (isset($_POST['dispo_livre'])) {
        $disponible = 'Oui';
    } else {
        $disponible = 'Non';
    }

    // $disponible = $_POST['dispo_livre'] ? 'Oui' : 'Non';

    $livre = [
        'titre' => $_POST['titre'],
        'id_theme' => $_POST['theme'],
        'id_auteur' => $_POST['auteur'],
        'id_editeur' => $_POST['editeur'],
        'date_parution' => $_POST['date_parution'],
        'disponible' => $disponible
    ];

    try {
        //APPEL DE LA FONCTION ajouterLivre
        $dbDaoLivre->modifierLivre($livre, $id_livre);
    } catch (Exception $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
}

function supprimerUnLivre($id_livre, $imagePath)
{
    global $dbDaoLivre;

    try {
        $dbDaoLivre->supprimerLivre($id_livre);
        //SUPPRIMER IMAGE STOCKEE
        if ($imagePath !== 'empty_book.png') {
            unlink('asset/images/livres/' . $imagePath);
        }
    } catch (\Throwable $erreur) {
        var_dump($erreur->getMessage());
        exit();
    }
};
