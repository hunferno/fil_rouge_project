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
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Fin de l'abonnement</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //EXPLOITER LES DONNEES
                foreach ($dataFromDB as $value) {
                    echo "<tr>";
                    switch ($value['nom_categorie_user']) {
                        case 'PROFESSEUR':
                            echo "<td><img class='image_livre' src='asset/images/users/profs/$value[photo_profile_user]'/></td>";
                            break;
                        case 'ETUDIANT':
                            echo "<td><img class='image_livre' src='asset/images/users/eleves/$value[photo_profile_user]'/></td>";
                            break;
                    }
                    echo "
                    <td>$value[nom_user]</td>
                    <td>$value[prenom_user]</td>
                    <td>$value[nom_categorie_user]</td>
                    <td>$value[expiration_abo_user]</td>

                    <td><a href='index.php?entite=user&action=FormModifUser&nom=$value[nom_user]&prenom=$value[prenom_user]&id=$value[uniqueId_user]'><i class='far fa-edit'></i></a> 
                    <a href='index.php?entite=user&action=supprimerUser&id=$value[uniqueId_user]&imagePath=$value[photo_profile_user]&categorie=$value[nom_categorie_user]'>
                    <i class='far fa-trash-alt'></i></a></td>
                    </tr>
                    <tr class='info_user'>
                        <td colspan='6'>
                            <div>
                            <p><b>Téléphone </b>: $value[telephone_user]</p>
                            <p><b>Email </b>: $value[email_user]</p>
                            <p><b>Adresse Postale </b>: $value[adresse_user]</p>
                            </div>
                        </td>
                    </tr>
                    ";
                };
                ?>
            </tbody>
        </table>
    </div>
</main>