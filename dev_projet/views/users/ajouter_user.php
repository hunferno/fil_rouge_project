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
        <form action="index.php?entite=user&action=ajouter_user" method="post">
            <h2>Ajouter un nouvel utilisateur</h2>

            <!-- AFFICHAGE ERREUR DE MOT DE PASSE -->
            <p class="erreurMDP"><?php echo $erreur ?></p>

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
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="ex. 0606060606">
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