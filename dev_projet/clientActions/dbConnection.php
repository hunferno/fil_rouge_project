<?php

//CONNECTION BD AVEC PDO AVEC PDO EXCEPTION
try {
    $dbConnect = new PDO('mysql:host=localhost;dbname=fil_rouge;charset=utf8', 'root', '');
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    //Envoyer une page d'erreur si connexion echouée
    header('Location:/pages/redirect_erreurDataBase.php');
    exit();
}

function userConnection($client)
{
    //APPEL DE LA VARIABLE GLOBALE
    global $dbConnect;

    //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
    $dbRequest = 'SELECT * FROM user WHERE email_user=:email';
    //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
    $dbResponse = $dbConnect->prepare($dbRequest);
    //COMPLETER LES DONNEES MANQUANTES A PARTIR DE LA REPONSE AVEC LE BINDPARAM
    $dbResponse->bindParam(':email', $client['email'], PDO::PARAM_STR);
    //EXECUTER L'INSTRUCTION FINALE
    $dbResponse->execute();

    //Si LA RESPONSE EST POSITIVE -> DONC EMAIL EXISTE
    if ($dbResponse->rowCount()) {
        $dataFromResponse = $dbResponse->fetch();
        return $dataFromResponse;
    } else {
        throw new Exception('Email inexistant dans la base de données');
    }
}

function ajouterLivre($livre)
{
    //APPEL DE LA VARIABLE GLOBALE
    global $dbConnect;

    //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
    $dbRequest = 'INSERT INTO livre VALUES (:id_livre, :titre, :disponible, :date_parution, :id_theme, :id_auteur, :id_editeur)';
    //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
    $dbResponse = $dbConnect->prepare($dbRequest);

    //TRANSFORMER LE TITRE EN MAJUSCULE
    $titre = trim(strtoupper($livre['titre']));

    //TRANSFORMER LA CHECKBOX EN BOOLEAN
    $checkbox = $livre['disponible'] ? 'Oui' : 'Non';

    //FORMATTER ID LIVRE -> TITRE,THEME,AUTEUR,EDITEUR&DATE
    //1-ON SUPPR LES ESPACES ET ON PREND LES 3 PREMIERS CARACTERES
    $formatTitre = substr(str_replace(' ', '', $livre['titre']), 0, 3);
    $formatDate = substr(str_replace(' ', '', $livre['date_parution']), 0, 3);

    //2-ON RECUPERE LA CONCATENATION DE TOUTES LES CHAINES
    $uniqueIdLivre = strtoupper($formatTitre . $livre['id_theme'] . $livre['id_auteur'] . $livre['id_editeur'] . $formatDate);

    //COMPLETER LES DONNEES MANQUANTES A PARTIR DE LA REPONSE AVEC LE BINDPARAM
    $dbResponse->bindParam(':id_livre', $uniqueIdLivre);
    $dbResponse->bindParam(':titre', $titre);
    $dbResponse->bindParam(':disponible', $checkbox);
    $dbResponse->bindParam(':date_parution', $livre['date_parution']);
    $dbResponse->bindParam(':id_theme', $livre['id_theme']);
    $dbResponse->bindParam(':id_auteur', $livre['id_auteur']);
    $dbResponse->bindParam(':id_editeur', $livre['id_editeur']);
    //EXECUTER L'INSTRUCTION FINALE
    $dbResponse->execute();
}

function modifierLivre($livre, $id_livre)
{
    //VARIABLE GLOBALE
    global $dbConnect;

    //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
    $dbRequest = 'UPDATE livre 
        SET id_livre=:id_livre,
        titre_livre=:titre, 
        disponibilite_livre=:disponible, 
        date_parution_livre=:date_parution, 
        id_theme=:id_theme, 
        id_auteur=:id_auteur, 
        id_editeur=:id_editeur 
        WHERE id_livre=\'' . $id_livre . '\';';

    //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
    $dbResponse = $dbConnect->prepare($dbRequest);

    //TRANSFORMER LE TITRE EN MAJUSCULE
    $titre = trim(strtoupper($livre['titre']));

    //TRANSFORMER LA CHECKBOX EN BOOLEAN
    $checkbox = $livre['disponible'] ? 'Oui' : 'Non';

    //FORMATTER ID LIVRE -> TITRE,THEME,AUTEUR,EDITEUR&DATE
    //1-ON SUPPR LES ESPACES ET ON PREND LES 3 PREMIERS CARACTERES
    $formatTitre = substr(str_replace(' ', '', $livre['titre']), 0, 3);
    $formatDate = substr(str_replace(' ', '', $livre['date_parution']), 0, 3);

    //2-ON RECUPERE LA CONCATENATION DE TOUTES LES CHAINES
    $uniqueIdLivre = strtoupper($formatTitre . $livre['id_theme'] . $livre['id_auteur'] . $livre['id_editeur'] . $formatDate);

    //COMPLETER LES DONNEES MANQUANTES A PARTIR DE LA REPONSE AVEC LE BINDPARAM
    $dbResponse->bindParam(':id_livre', $uniqueIdLivre);
    $dbResponse->bindParam(':titre', $titre);
    $dbResponse->bindParam(':disponible', $checkbox);
    $dbResponse->bindParam(':date_parution', $livre['date_parution']);
    $dbResponse->bindParam(':id_theme', $livre['id_theme']);
    $dbResponse->bindParam(':id_auteur', $livre['id_auteur']);
    $dbResponse->bindParam(':id_editeur', $livre['id_editeur']);
    //EXECUTER L'INSTRUCTION FINALE
    $dbResponse->execute();
}

function afficherLivres()
{
    //VARIABLE GLOBALE
    global $dbConnect;

    //REQUETE A LA BASE DE DONNÉE SANS VARIABLE
    $dbRequest = 'SELECT * FROM livre NATURAL JOIN theme NATURAL JOIN editeur NATURAL JOIN auteur;';
    //REPONSE DE LA BD A PARTIR DE LA CONNECTION
    $dbResponse = $dbConnect->query($dbRequest);
    //AFFICHAGE DU RESULTAT AVEC FETCHALL
    $dataFromDB = $dbResponse->fetchAll(PDO::FETCH_ASSOC);

    return $dataFromDB;
}
