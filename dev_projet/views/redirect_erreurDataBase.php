<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numéros Utiles</title>

    <link rel="icon" href="../asset/favicon.ico" />
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/redirect_website_style.css">
</head>

<body>
    <div id="container">
        <?php
        require '../composants/header.php';
        ?>

        <main id="main_redirect">
            <div class="redirection">
                <h2>ERREUR CONNECTION A LA BASE DE DONNÉE</h2>
                <p>
                    Une erreur est survenue lors de la tentative de connection à la base de donnée.
                    <br>
                    Nous nous excusons pour la gêne occasionnée.
                    <br>
                </p>
                <p style="font-size: 2rem;">Merci de rééssayer plus tard!</p>
            </div>
        </main>

        <?php
        require '../composants/footer.php';
        ?>
    </div>

</body>

</html>