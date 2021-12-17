<?php

require 'Dao.php';

class DaoLivre extends Dao
{

    function ajouterLivre($livre)
    {
        //APPEL DE LA VARIABLE GLOBALE
        // global $dbConnect;

        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = 'INSERT INTO livre VALUES (:id_livre, :titre, :disponible, :date_parution, :photo_livre, :id_theme, :id_auteur, :id_editeur)';
        //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
        $dbResponse = $this->dbConnect->prepare($dbRequest);

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
        $dbResponse->bindParam(':photo_livre', $livre['image_livre']);
        $dbResponse->bindParam(':id_theme', $livre['id_theme']);
        $dbResponse->bindParam(':id_auteur', $livre['id_auteur']);
        $dbResponse->bindParam(':id_editeur', $livre['id_editeur']);
        //EXECUTER L'INSTRUCTION FINALE
        $dbResponse->execute();
    }

    function modifierLivre($livre, $id_livre)
    {
        //VARIABLE GLOBALE
        // global $dbConnect;

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
        $dbResponse = $this->dbConnect->prepare($dbRequest);

        //TRANSFORMER LE TITRE EN MAJUSCULE
        $titre = trim(strtoupper($livre['titre']));

        //FORMATTER ID LIVRE -> TITRE,THEME,AUTEUR,EDITEUR&DATE
        //1-ON SUPPR LES ESPACES ET ON PREND LES 3 PREMIERS CARACTERES
        $formatTitre = substr(str_replace(' ', '', $livre['titre']), 0, 3);
        $formatDate = substr(str_replace(' ', '', $livre['date_parution']), 0, 3);

        //2-ON RECUPERE LA CONCATENATION DE TOUTES LES CHAINES
        $uniqueIdLivre = strtoupper($formatTitre . $livre['id_theme'] . $livre['id_auteur'] . $livre['id_editeur'] . $formatDate);

        //COMPLETER LES DONNEES MANQUANTES A PARTIR DE LA REPONSE AVEC LE BINDPARAM
        $dbResponse->bindParam(':id_livre', $uniqueIdLivre);
        $dbResponse->bindParam(':titre', $titre);
        $dbResponse->bindParam(':disponible', $livre['disponible']);
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
        // global $dbConnect;

        //REQUETE A LA BASE DE DONNÉE SANS VARIABLE
        $dbRequest = 'SELECT * FROM livre NATURAL JOIN theme NATURAL JOIN editeur NATURAL JOIN auteur;';
        //REPONSE DE LA BD A PARTIR DE LA CONNECTION
        $dbResponse = $this->dbConnect->query($dbRequest);
        //AFFICHAGE DU RESULTAT AVEC FETCHALL
        $dataFromDB = $dbResponse->fetchAll(PDO::FETCH_ASSOC);

        return $dataFromDB;
    }

    function supprimerLivre($id_livre)
    {
        // global $dbConnect;

        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = "DELETE FROM livre WHERE id_livre =:id;";
        $prepareRequest = $this->dbConnect->prepare($dbRequest);
        //AJOUT DES VARIABLES
        $prepareRequest->bindParam(':id', $id_livre);
        //EXECUTION DE LA REQUETE
        $prepareRequest->execute();
    }
}
