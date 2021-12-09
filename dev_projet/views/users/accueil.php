<?php
// REDIRECTION SI SESSION N'EXISTE PAS
if (empty($_SESSION)) {
    header('Location:index.php?entite=redirection&action=redirectHome');
}

// $nomPage = 'admin_dashboard_accueil';
$telephone = $_SESSION['userPhone'];
?>

<main id="accueil_dashboard">
    <?php
    require 'views/composants/aside.php';
    ?>
    <div class="dashboard_containt">
        <div class="card" style="width: 18rem;">
            <img src="../../asset/blank-profile-picture.png" class="card-img-top" alt="blank profile image">
            <div class="card-body">
                <h3><em>Admin</em></h3>
                <div>
                    <p class="card-text"><i class="fas fa-envelope"></i> : <?php echo $email ?></p>
                    <p class="card-text"><i class="fas fa-phone"></i> : <?php echo $telephone ?></p>
                </div>
            </div>
        </div>
    </div>
</main>