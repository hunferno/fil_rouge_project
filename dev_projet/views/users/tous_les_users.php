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
                    <!-- <th scope="col">Email</th>
                    <th scope="col">Adresse Postale</th>
                    <th scope="col">Téléphone</th> -->
                    <th scope="col">Catégorie</th>
                    <th scope="col">Fin de l'abonnement</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //EXPLOITER LES DONNEES
                foreach ($dataFromDB as $value) {
                    // echo "$value[id_livre]";
                    // <th scope='row'>$value[id_livre]</th>
                    // <th scope='row'>$value[id_livre]</th>
                    // <td>$value[titre_livre]</td>
                    echo "<tr>";
                    switch ($value['nom_categorie_user']) {
                        case 'professeur':
                            echo "<td><img class='image_livre' src='asset/images/users/profs/$value[photo_profile_user]'/></td>";
                            break;
                        case 'etudiant':
                            echo "<td><img class='image_livre' src='asset/images/users/eleves/$value[photo_profile_user]'/></td>";
                            break;
                    }
                    echo "
                    <td>$value[nom_user]</td>
                    <td>$value[prenom_user]</td>
                    <td>$value[nom_categorie_user]</td>
                    <td>$value[expiration_abo_user]</td>

                    <td><a href='index.php?entite=livre&action=FormModifLivre&nom=$value[nom_user]&prenom=$value[prenom_user]&id=$value[uniqueId_user]'><i class='far fa-edit'></i></a> 
                    <a href='index.php?entite=livre&action=supprimerLivre&id=$value[uniqueId_user]'>
                    <i class='far fa-trash-alt'></i></a></td>
                    </tr>
                    <tr class='info_user'>
                        <td colspan='6'>
                            <div>
                            
                            </div>
                            <div>
                            
                            </div>
                        </td>
                    </tr>
                    ";
                };
                // <td>$value[email_user]</td>
                // <td>$value[adresse_user]</td>
                // <td>$value[telephone_user]</td>

                ?>
            </tbody>
        </table>
    </div>
</main>