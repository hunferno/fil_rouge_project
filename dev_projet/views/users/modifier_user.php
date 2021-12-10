<?php
// REDIRECTION SI SESSION N'EXISTE PAS
if (empty($_SESSION)) {
    header('Location:index.php?entite=redirection&action=redirectHome');
}
?>

<main id="accueil_dashboard">
    <?php
    require 'views/composants/aside.php';
    ?>
    <section class="dashboard_ajouterLivre">
        <form action="index.php?entite=user&action=modifier_user&id=<?php echo $id_user ?>" method="post" enctype="multipart/form-data">
            <h2>Modifier votre profile <?php echo $prenom . " " . $nom ?></h2>

            <!-- AFFICHAGE ERREUR DE MOT DE PASSE -->
            <p class="erreurMDP"><?php echo $erreur ?></p>

            <!-- NOM UTILISATEUR -->
            <div class="mb-3">
                <label>Modifier le nom *</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nom ?>" placeholder="ex. Dujardin">
            </div>

            <!-- PRENOM UTILISATEUR -->
            <div class="mb-3">
                <label for="prenom">Modifier le prénom *</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $prenom ?> placeholder=" ex. Jean">
            </div>

            <!-- MDP UTILISATEUR -->
            <div class="mb-3">
                <label for="mdp">Modifier le mot de passe *</label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="******">
            </div>

            <!-- VALIDATION MDP UTILISATEUR -->
            <div class="mb-3">
                <label for="confirmMDP">Confirmer le mot de passe *</label>
                <input type="password" class="form-control" name="confirmMDP" id="confirmMDP" placeholder="******">
            </div>

            <!-- CATEGORIE USER -->
            <div class="mb-3">
                <label for="categorie">Selectionner une catégorie *</label>
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