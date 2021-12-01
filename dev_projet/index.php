<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>

    <link rel="icon" href="./asset/favicon.ico" />
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div id="container">
        <?php
        require './composants/header.php';
        ?>

        <main>
            <div class="connexion">
                <h2>CONNEXION</h2>
                <form action="" method="post">
                    <div class="input_group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input_group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <button type="submit">Se connecter</button>
                </form>
            </div>
        </main>

        <?php
        require './composants/footer.php';
        ?>
    </div>

    <script src="./javascript/index.js"></script>
</body>

</html>

<!-- https://www.justgeek.fr/wp-content/uploads/2021/06/windows-11-fond-ecran-wallpaper-3-scaled.jpg -->