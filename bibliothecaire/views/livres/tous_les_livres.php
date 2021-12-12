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
                    <th scope="col">Image</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Éditeur</th>
                    <th scope="col">Disponible</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //EXPLOTER LES DONNEES
                foreach ($dataFromDB as $value) {
                    // echo "$value[id_livre]";
                    // <th scope='row'>$value[id_livre]</th>
                    // <th scope='row'>$value[id_livre]</th>
                    // <td>$value[titre_livre]</td>
                    echo "<tr>
                    <td><img class='image_livre' src='asset/images/livres/$value[photo_livre]'/></td>
                    <td>$value[titre_livre]</td>
                    <td>$value[nom_auteur]</td>
                    <td>$value[raison_sociale_editeur]</td>
                    <td>$value[disponibilite_livre]</td>
                    <td><a href='index.php?entite=livre&action=FormModifLivre&titre=$value[titre_livre]&id=$value[id_livre]'><i class='far fa-edit'></i></a> 
                    <a href='index.php?entite=livre&action=supprimerLivre&id=$value[id_livre]&imagePath=$value[photo_livre]'>
                    <i class='far fa-trash-alt'></i></a></td>
                    </tr>";
                };
                ?>
            </tbody>
        </table>
    </div>
</main>