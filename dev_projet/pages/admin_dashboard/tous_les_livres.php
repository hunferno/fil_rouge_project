<?php
session_start();

// REDIRECTION SI SESSION N'EXISTE PAS
if (!isset($_SESSION['userFirstName'])) {
    header('Location:/index.php');
}

$nomPage = 'tous_les_livres';

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
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
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
                            <th scope="col">Maison d'édition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
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