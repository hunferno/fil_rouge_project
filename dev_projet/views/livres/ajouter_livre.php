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
        <form action="index.php?entite=livre&action=ajoutLivreDb" method="post">
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