<?php
session_start();
$nomPage = 'admin_dashboard';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="icon" href="../asset/favicon.ico" />
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <?php
    // REDIRECTION SI SESSION N'EXISTE PAS
    if (!isset($_SESSION['userFirstName'])) {
        header('Location:/index.php');
    }
    ?>
    <div id="container">
        <?php
        require '../composants/header.php';
        ?>

        <main>
            <div class="menu">
                <div class="dashBtn gest_livres">
                    <a href="">GESTION DES LIVRES</a>
                </div>
                <!-- <div class="dashBtn creat_abonne">
                    <a href="">CREATION D'UN ABONNÉ</a>
                </div> -->
                <div class="dashBtn gest_abonnes">
                    <a href="">GESTION DES ABONNÉS</a>
                </div>
            </div>
        </main>

        <?php
        require '../composants/footer.php';
        ?>
    </div>

    <script src="../javascript/index.js"></script>
</body>

</html>

<!-- https://www.justgeek.fr/wp-content/uploads/2021/06/windows-11-fond-ecran-wallpaper-3-scaled.jpg -->