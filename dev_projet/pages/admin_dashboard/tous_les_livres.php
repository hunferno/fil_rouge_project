<?php
session_start();
$nomPage = 'tous_les_livres';

// REDIRECTION SI SESSION N'EXISTE PAS
if (!isset($_SESSION['userFirstName'])) {
    header('Location:/index.php');
}

//REQUETE SQL POUR OBTENIR TOUS LES LIVRES
//CONNECTION BD AVEC PDO
$dbConnect = new PDO('mysql:host=localhost;dbname=fil_rouge;charset=utf8', 'root', '');
//REQUETE A LA BASE DE DONNÉE SANS VARIABLE
$dbRequest = 'SELECT * FROM livre INNER JOIN theme ON (livre.id_theme = theme.id_theme) INNER JOIN auteur ON (livre.id_auteur = auteur.id_auteur) INNER JOIN editeur ON (livre.id_editeur=editeur.id_editeur);';
//REPONSE DE LA BD A PARTIR DE LA CONNECTION
$dbResponse = $dbConnect->query($dbRequest);
//AFFICHAGE DU RESULTAT AVEC FETCHALL
$dataFromDB = $dbResponse->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher tous les livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="icon" href="/asset/favicon.ico" />
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/admin_accueil_style.css">
</head>

<body>
    <div id="container_dashboard">
        <?php
        require '../../composants/header.php';
        ?>

        <main id="accueil_dashboard">
            <?php
            require '../../composants/aside.php';
            ?>
            <div class="dashboard_ajouterLivre">
                <!-- Bar de recherche Bootstrap-->
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Rechercher un livre" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <!-- Table d'affichage resultat -->
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Livre</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Éditeur</th>
                            <th scope="col">Disponible</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //FORMATTER LA DISPONIBILITE
                        foreach ($dataFromDB as $value) {
                            // echo "$value[id_livre]";
                            echo "<tr>
                            <th scope='row'>$value[id_livre]</th>
                            <td>$value[titre_livre]</td>
                            <td>$value[nom_auteur]</td>
                            <td>$value[raison_sociale_editeur]</td>
                            <td>$value[disponibilite_livre]</td>
                            <td><a href='/pages/admin_dashboard/modifier_livre.php?titre=$value[titre_livre]&id=$value[id_livre]'><i class='far fa-edit'></i></a> 
                            <a href='/pages/traitements/delete.php?id=$value[id_livre]'>
                            <i class='far fa-trash-alt'></i></a></td>
                            </tr>";
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </main>

        <?php
        require '../../composants/footer.php';
        ?>
    </div>

    <script src="../javascript/index.js"></script>
</body>

</html>