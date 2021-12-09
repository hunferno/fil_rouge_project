<?php
session_start();
// var_dump(date("y.m.d"));
// die();
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
    <title>Ajouter un utilisateur</title>
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
        //OBLIGATOIRE
        require('../../clientActions/dbConnection.php');

        //RECUPERATION DES DONNEES DU FORMULAIRE
        $user = [
            'nom_user' => $_POST['nom'],
            'prenom_user' => $_POST['prenom'],
            'adresse_user' => $_POST['adresse'],
            'telephone_user' => $_POST['telephone'],
            'mdp' => $_POST['mdp'],
            'confirmMDP' => $_POST['confirmMDP'],
            'date_inscription_user' => date("y.m.d"),
            'categorie_user' => $_POST['categorie'],
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
                    <h2>Ajouter un nouvel utilisateur</h2>

                    <!-- NOM UTILISATEUR -->
                    <div class="mb-3">
                        <label>Entrez un nom *</label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="ex. Dujardin">
                    </div>

                    <!-- PRENOM UTILISATEUR -->
                    <div class="mb-3">
                        <label for="prenom">Entrez un prénom *</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="ex. Jean">
                    </div>

                    <!-- ADRESSE UTILISATEUR -->
                    <div class="mb-3">
                        <label for="adresse">Entrez une adresse *</label>
                        <input type="text" class="form-control" name="adresse" id="adresse" placeholder="ex. 9 rue marc seguin 94000 créteil">
                    </div>

                    <!-- TELEPHONE UTILISATEUR -->
                    <div class="mb-3">
                        <label for="telephone">Entrez un numéro de téléphone *</label>
                        <input type="text" class="form-control" name="titre" id="telephone" placeholder="ex. 0606060606">
                    </div>

                    <!-- EMAIL UTILISATEUR -->
                    <div class="mb-3">
                        <label for="email">Entrez un email *</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="ex. jean.dujardin@email.com">
                    </div>

                    <!-- MDP UTILISATEUR -->
                    <div class="mb-3">
                        <label for="mdp">Entrez un mot de passe *</label>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="******">
                    </div>

                    <!-- VALIDATION MDP UTILISATEUR -->
                    <div class="mb-3">
                        <label for="confirmMDP">Confirmer le mot de passe *</label>
                        <input type="password" class="form-control" name="confirmMDP" id="confirmMDP" placeholder="******">
                    </div>

                    <div class="mb-3">
                        <label for="categorie">Selectionnez une catégorie *</label>
                        <select class="mb-3 form-select" name="categorie" id="categorie" required>
                            <option value="2">Étudiant</option>
                            <option value="3">Professeur</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer utilisateur</button>
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