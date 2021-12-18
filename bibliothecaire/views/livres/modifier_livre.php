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
        <form action="index.php?entite=livre&action=modifierLivreDb&id=<?php echo $_GET['id'] ?>" method="post">
            <h2>Modifier le livre <em>'<?php echo "$titre_livre" ?>'</em></h2>
            <div class="mb-3">
                <input type="text" class="form-control" name="titre" value="<?php echo $titre_livre ?>" id="titre" placeholder="Titre : ex. La fille de papier *">
            </div>

            <select class="mb-3 form-select" name="theme" required>
                <option selected disabled>Selectionner un thème *</option>
                <?php
                foreach ($allThemes as $theme) {
                    echo "<option value=$theme[id_theme]>$theme[nom_theme]";
                }
                ?>
            </select>

            <select class="mb-3 form-select" name="auteur" required>
                <option selected disabled>Selectionner un auteur *</option>
                <?php
                foreach ($allAuteurs as $auteur) {
                    echo "<option value=$auteur[id_auteur]>$auteur[nom_auteur]";
                }
                ?>
            </select>

            <select class="mb-3 form-select" name="editeur" required>
                <option selected disabled>Selectionner une maison d'édition *</option>
                <?php
                foreach ($allEditeurs as $editeur) {
                    echo "<option value=$editeur[id_editeur]>$editeur[raison_sociale_editeur]";
                }
                ?>
            </select>

            <div class="mb-3">
                <label for="date" class="form-label">Date de parution *</label>
                <input type="date" name="date_parution" id="date" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="dispo_livre" name="dispo_livre">
                <label class="form-check-label" for="dispo_livre">Disponible immédiatement</label>
            </div>

            <button type="submit" class="btn btn-primary">Modifier livre</button>
        </form>
        </form>
    </section>
</main>