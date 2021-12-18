<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médiathèque du sud</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">


    <link rel="icon" href="./asset/favicon.ico" />
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/index_style.css">
    <link rel="stylesheet" href="./style/admin_accueil_style.css">
    <link rel="stylesheet" href="./style/redirect_website_style.css">
    <link rel="stylesheet" href="./style/numeros_utiles_style.css">
</head>

<body>
    <div id="container">
        <?php
        require 'views/composants/header.php';
        require $vue . '.php';
        require 'views/composants/footer.php';
        ?>
    </div>

    <script src="./javascript/index.js"></script>
</body>

</html>