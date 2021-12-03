<?php
session_start();
$nomPage = 'numerosUtiles';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numéros Utiles</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="icon" href="./asset/favicon.ico" />
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div id="container">
        <?php
        require '../composants/header.php';
        ?>

        <main>
            <div class="numeros">
                <div class="sectionPart">
                    <h3>Administration</h3>
                    <div class="administration">
                        <p>
                            <span>Ressources Humaines : </span>
                            <span>00-12-45</span>
                        </p>
                        <p>
                            <span>Service Informatique : </span>
                            <span>00-17-12</span>
                        </p>
                        <p>
                            <span>Secrétariat : </span>
                            <span>00-18-78</span>
                        </p>
                        <p>
                            <span>La Mairie : </span>
                            <span>00-11-25</span>
                        </p>
                    </div>

                </div>
                <div class="sectionPart">
                    <h3>Urgences</h3>
                    <div class="urgences">
                        <p>
                            <span>SAMU : </span>
                            <span>15</span>
                        </p>
                        <p>
                            <span>Police Secours : </span>
                            <span>17</span>
                        </p>
                        <p>
                            <span>Sapeurs Pompiers : </span>
                            <span>18</span>
                        </p>
                        <p>
                            <span>Toute Urgence : </span>
                            <span>112</span>
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <?php
        require '../composants/footer.php';
        ?>
    </div>

</body>

</html>