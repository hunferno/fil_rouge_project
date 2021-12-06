<?php
session_start();

//OBLIGATOIRE
require('../../clientActions/dbConnection.php');

// REDIRECTION SI SESSION N'EXISTE PAS
if (!isset($_SESSION['userFirstName'])) {
    header('Location:/index.php');
}

$nomPage = 'ajouter_livre';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="icon" href="/asset/favicon.ico" />
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/admin_accueil_style.css">
</head>

<body>
    <!-- TRAITEMENT DES DONNEES ENVOYER SI ON VIENT D'UN POST-->
    <?php
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
            var_dump($error->getMessage());
            exit();
        }
    }
    ?>
    <!-- FIN TRAITEMENT DES DONNEES ENVOYER -->

    <div id="container_dashboard">
        <?php
        require '../../composants/header.php';
        ?>

        <main id="accueil_dashboard">
            <?php
            require '../../composants/aside.php';
            ?>
            <section class="dashboard_ajouterLivre">
                <form action="#" method="post">
                    <h2>Ajouter un nouveau livre</h2>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre : ex. La fille de papier *">
                    </div>

                    <select class="mb-3 form-select" name="theme" required>
                        <option selected disabled>Selectionner un thème *</option>
                        <option value="1">amour</option>
                        <option value="2">aventure</option>
                        <option value="3">policier</option>
                        <option value="4">fantastique</option>
                        <option value="5">science-fiction</option>
                        <option value="6">fantasy</option>
                        <option value="7">animaux</option>
                        <option value="8">nature</option>
                        <option value="9">histoire</option>
                        <option value="10">sport</option>
                    </select>

                    <select class="mb-3 form-select" name="auteur" required>
                        <option selected disabled>Selectionner un auteur *</option>
                        <option value="1">Honoré de Balzac</option>
                        <option value="2">Molière</option>
                        <option value="3">Albert Camus</option>
                        <option value="4">Guillaume Musso</option>
                        <option value="5">Voltaire</option>
                        <option value="6">Victor Hugo</option>
                        <option value="7">Alfred de Musset</option>
                        <option value="8">Jules Verne</option>
                        <option value="9">Emile zola</option>
                        <option value="10">Guy de Maupassant</option>
                        <option value="11">Marc Levy</option>
                    </select>

                    <select class="mb-3 form-select" name="editeur" required>
                        <option selected disabled>Selectionner une maison d'édition *</option>
                        <option value="1">Gallimard</option>
                        <option value="2">Flammarion</option>
                        <option value="3">Milan</option>
                        <option value="4">Baudelaire</option>
                        <option value="5">Hachette</option>
                        <option value="6">Le léopard masqué</option>
                        <option value="7">Allary</option>
                        <option value="8">Julliard</option>
                    </select>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date de parution *</label>
                        <input type="date" name="date_parution" id="date">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="dispo_livre" name="dispo_livre">
                        <label class="form-check-label" for="dispo_livre">Disponible immédiatement</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer livre</button>
                </form>
                </form>
            </section>
        </main>

        <?php
        require '../../composants/footer.php';
        ?>
    </div>

    <script src="../javascript/index.js"></script>
</body>

</html>