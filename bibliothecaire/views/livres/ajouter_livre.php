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
        <form action="index.php?entite=livre&action=ajoutLivreDb" method="post" enctype="multipart/form-data">
            <h2>Ajouter un nouveau livre</h2>
            <div class="mb-3">
                <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre : ex. La fille de papier *">
            </div>

            <div>
                <div class="addSelect">
                    <select class="mb-3 form-select" name="theme" required>
                        <option selected disabled>Selectionner un thème *</option>
                        <?php
                        foreach ($allThemes as $key => $theme) {
                            echo "<option value=$theme[id_theme]>$theme[nom_theme]";
                        }
                        ?>
                    </select>
                    <i class="far fa-plus-square fa-2x"></i>
                    <i class="far fa-minus-square fa-2x"></i>
                </div>
                <div class="selection mb-3" action="" method="post">
                    <?php echo $erreur ?>
                    <label for="newTheme">Ajouter un nouveau thème</label>
                    <input type="text" class="form-control" name="newTheme" id="newTheme">
                    <button class="btn btn-primary" type="submit" name="action" value="theme">Ajouter Thème</button>
                </div>

            </div>

            <div>
                <div class="addSelect">
                    <select class="mb-3 form-select" name="auteur" required>
                        <option selected disabled>Selectionner un auteur *</option>
                        <?php
                        foreach ($allAuteurs as $key => $auteur) {
                            echo "<option value=$auteur[id_auteur]>$auteur[nom_auteur]";
                        }
                        ?>
                    </select>
                    <i class="far fa-plus-square fa-2x"></i>
                    <i class="far fa-minus-square fa-2x"></i>
                </div>
                <div class="selection mb-3" action="" method="post">
                    <?php echo $erreur ?>
                    <label for="newAuteur">Ajouter un nouvel auteur</label>
                    <input type="text" class="form-control" name="newAuteur" id="newAuteur">
                    <button class="btn btn-primary" type="submit" name="action" value="auteur">Ajouter Auteur</button>
                </div>

            </div>

            <div>
                <div class="addSelect">
                    <select class="mb-3 form-select" name="editeur" required>
                        <option selected disabled>Selectionner une maison d'édition *</option>
                        <?php
                        foreach ($allEditeurs as $key => $editeur) {
                            echo "<option value=$editeur[id_editeur]>$editeur[raison_sociale_editeur]";
                        }
                        ?>
                    </select>
                    <i class="far fa-plus-square fa-2x"></i>
                    <i class="far fa-minus-square fa-2x"></i>
                </div>
                <div class="selection mb-3" action="" method="post">
                    <?php echo $erreur ?>
                    <label for="newEditeur">Ajouter un nouvel éditeur</label>
                    <input type="text" class="form-control" name="newEditeur" id="newEditeur">
                    <button class="btn btn-primary" type="submit" name="action" value="editeur">Ajouter Éditeur</button>

                </div>
            </div>

            <div class="mb-3" style='display:flex; flex-direction:column'>
                <label for="file" class="form-label">Selectionner une image</label>
                <input type="file" name="image_livre" id="file">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date de parution *</label>
                <input type="date" name="date_parution" id="date">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="dispo_livre" name="dispo_livre">
                <label class="form-check-label" for="dispo_livre">Disponible immédiatement</label>
            </div>

            <button type="submit" class="btn btn-primary" name="action" value="livre">Enregistrer livre</button>
        </form>
        </form>
    </section>
</main>