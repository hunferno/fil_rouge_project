<?php

require 'Dao.php';

class DaoUser extends Dao
{
    public function userConnection($client)
    {
        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = 'SELECT * FROM user WHERE email_user=:email';
        //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
        $dbResponse = $this->dbConnect->prepare($dbRequest);
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

    public function ajouterUser($user)
    {
        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = 'INSERT INTO user VALUES (:uniqueId_user, :nom_user, :prenom_user, :adresse_user, :telephone_user, :email_user, :password_user, :date_inscription_user, :photo_user, :expiration_abonnement, :id_categorie_user)';
        //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
        $dbResponse = $this->dbConnect->prepare($dbRequest);

        //TRANSFORMER LES DONNÉES EN MAJUSCULE
        $nom_user = trim(strtoupper($user['nom']));
        $prenom_user = trim(strtoupper($user['prenom']));
        $adresse_user = trim(strtoupper($user['adresse']));
        $telephone_user = trim($user['telephone']);

        //TRANSFORMER LES DONNÉES EN MINISCULE
        $email_user = trim(strtolower($user['email']));

        //FORMATAGE DES DATES D'ABONNEMENT ET EXPIRATION_ABONNEMENT
        $date_inscription = date("Y.m.d");
        $expiration_abonnement = date("Y.m.d", strtotime('+1 year'));

        //FORMATTER UNIQUE ID USER -> NOM,PRENOM,NBRE ALEATOIRE
        //1-ON SUPPR LES ESPACES ET ON PREND LES 3 PREMIERS CARACTERES
        $nom_user_cut = substr($nom_user, 0, 3);
        $prenom_user_cut = substr($prenom_user, 0, 3);
        //2-ON CREE UN NBRE ALEATOIRE
        $nbre_aleatoire = rand(1, 999);
        //ON RAJOUTE DES 0 SI PAS 3 DIGITS
        $nbre_digit = strlen($nbre_aleatoire);
        switch ($nbre_digit) {
            case '1':
                $new_nbre_aleatoire = '00' . $nbre_aleatoire;
                break;
            case '2':
                $new_nbre_aleatoire = '0' . $nbre_aleatoire;
                break;
            default:
                $new_nbre_aleatoire = $nbre_aleatoire;
                break;
        }

        //CREATION DE UNIQUE ID
        $uniqueId_user = $nom_user_cut . $prenom_user_cut . $new_nbre_aleatoire;

        //VERIFICATION DU PASSWORD
        if ($user['password'] === $user['confirmMDP']) {

            //CRYPTAGE SI PASSWORD VERIFIE
            $password_user = password_hash($user['password'], PASSWORD_DEFAULT);

            //COMPLETER LES DONNEES MANQUANTES A PARTIR DE LA REPONSE AVEC LE BINDPARAM
            $dbResponse->bindParam(':uniqueId_user', $uniqueId_user);
            $dbResponse->bindParam(':nom_user', $nom_user);
            $dbResponse->bindParam(':prenom_user', $prenom_user);
            $dbResponse->bindParam(':adresse_user', $adresse_user);
            $dbResponse->bindParam(':telephone_user', $telephone_user);
            $dbResponse->bindParam(':email_user', $email_user);
            $dbResponse->bindParam(':password_user',  $password_user);
            $dbResponse->bindParam(':date_inscription_user', $date_inscription);
            $dbResponse->bindParam(':photo_user', $user['photo_user']);
            $dbResponse->bindParam(':expiration_abonnement', $expiration_abonnement);
            $dbResponse->bindParam(':id_categorie_user', $user['categorie']);
            //EXECUTER L'INSTRUCTION FINALE
            $dbResponse->execute();
        } else {
            throw new Exception('<div class="alert alert-danger" role="alert">
        Les mots de passe doivent être identiques</div>');
        }
    }

    public function afficherUsers()
    {
        //REQUETE A LA BASE DE DONNÉE SANS VARIABLE
        $dbRequest = 'SELECT * FROM user NATURAL JOIN categorie_user WHERE id_categorie_user != 1;';

        //REPONSE DE LA BD A PARTIR DE LA CONNECTION
        $dbResponse = $this->dbConnect->query($dbRequest);
        //AFFICHAGE DU RESULTAT AVEC FETCHALL
        $dataFromDB = $dbResponse->fetchAll(PDO::FETCH_ASSOC);

        return $dataFromDB;
    }

    public function supprimerUser($id_user)
    {
        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = "DELETE FROM user WHERE uniqueId_user =:id;";
        $prepareRequest = $this->dbConnect->prepare($dbRequest);
        //AJOUT DES VARIABLES
        $prepareRequest->bindParam(':id', $id_user);
        //EXECUTION DE LA REQUETE
        $prepareRequest->execute();
    }

    public function modifierUser($id_user, $user)
    {
        //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
        $dbRequest = 'UPDATE user 
        SET nom_user=:nom_user,
        prenom_user=:prenom_user, 
        password_user=:password_user, 
        id_categorie_user=:id_categorie_user
        WHERE uniqueId_user=\'' . $id_user . '\';';

        //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
        $dbResponse = $this->dbConnect->prepare($dbRequest);

        //TRANSFORMER LES DONNÉES EN MAJUSCULE
        $nom_user = trim(strtoupper($user['nom']));
        $prenom_user = trim(strtoupper($user['prenom']));

        //VERIFICATION DU PASSWORD
        if ($user['password'] === $user['confirmMDP']) {
            //CRYPTAGE SI PASSWORD VERIFIE
            $password_user = password_hash($user['password'], PASSWORD_DEFAULT);

            //COMPLETER LES DONNEES MANQUANTES A PARTIR DE LA REPONSE AVEC LE BINDPARAM
            $dbResponse->bindParam(':nom_user', $nom_user);
            $dbResponse->bindParam(':prenom_user', $prenom_user);
            $dbResponse->bindParam(':password_user',  $password_user);
            $dbResponse->bindParam(':id_categorie_user', $user['categorie']);
            //EXECUTER L'INSTRUCTION FINALE
            $dbResponse->execute();
        } else {
            throw new Exception('<div class="alert alert-danger" role="alert">
        Les mots de passe doivent être identiques</div>');
        }
    }
}
