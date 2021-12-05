<?php

//CONNECTION BD AVEC PDO
$dbConnect = new PDO('mysql:host=localhost;dbname=fil_rouge;charset=utf8', 'root', '');

function supprimerLivre($db, $id_livre)
{
    //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
    $dbRequest = "DELETE FROM livre WHERE id_livre =:id;";
    $prepareRequest = $db->prepare($dbRequest);
    //AJOUT DES VARIABLES
    $prepareRequest->bindParam(':id', $id_livre);
    //EXECUTION DE LA REQUETE
    $prepareRequest->execute();
};

supprimerLivre($dbConnect, $_GET['id']);
header('Location:/pages/admin_dashboard/tous_les_livres.php');
