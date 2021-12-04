<?php
session_start();

// REDIRECTION SI SESSION N'EXISTE PAS
if (!isset($_SESSION['userFirstName'])) {
    header('Location:/index.php');
}

$nomPage = 'admin_dashboard_accueil';
$email = $_SESSION['userEmail'];
$telephone = $_SESSION['userPhone'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="icon" href="/asset/favicon.ico" />
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/admin_accueil_style.css">
</head>

<body>
    <div id="container_dashboard">
        <?php
        require '../../composants/header.php';
        ?>

        <main id="accueil_dashboard">
            <?php
            require '../../composants/aside.php';
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

        <?php
        require '../../composants/footer.php';
        ?>
    </div>

    <script src="../javascript/index.js"></script>
</body>

</html>