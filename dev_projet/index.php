<?php
session_start();
$nomPage = "home";
$email = ""
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="icon" href="./asset/favicon.ico" />
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/index_style.css">
</head>

<body>

    <!-- REDIRECTION SI SESSION EXISTE -->
    <?php
    if (isset($_SESSION['userFirstName'])) {
        header('Location:/pages/admin_dashboard/accueil.php');
    }
    ?>

    <div id="container">
        <?php
        require './composants/header.php';
        ?>

        <main id="main_index">

            <!-- Si METHODE POST -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //RECUPERATION DES DONNEES DU FORMULAIRE
                $client = [
                    'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                    'password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)
                ];

                //CONNECTION BD AVEC PDO
                $dbConnect = new PDO('mysql:host=localhost;dbname=fil_rouge;charset=utf8', 'root', '');
                //REQUETE A LA BASE DE DONNÉE AVEC VARIABLE
                $dbRequest = 'SELECT * FROM user WHERE email_user=:email';
                //REPONSE PARTIELLE DE LA BD A PARTIR DE LA CONNECTION
                $dbResponse = $dbConnect->prepare($dbRequest);
                //COMPLETER LES DONNEES MANQUANTES A PARTIR DE LA REPONSE AVEC LE BINDPARAM
                $dbResponse->bindParam(':email', $client['email'], PDO::PARAM_STR);
                //EXECUTER L'INSTRUCTION FINALE
                $dbResponse->execute();

                //Si LA RESPONSE EST POSITIVE -> DONC EMAIL EXISTE
                if ($dbResponse->rowCount()) {
                    $email = $client['email'];
                    $dataFromResponse = $dbResponse->fetch();

                    // var_dump($dataFromResponse['id_categorie_user']);
                    // die();

                    //VERIFICATION SI USER EST ADMIN
                    if ($dataFromResponse['id_categorie_user'] === "1") {
                        //VERIFICATION DU MDP
                        $passwordVerify = password_verify($client['password'], $dataFromResponse['password_user']);
                        //SI MDP BON
                        if ($passwordVerify) {
                            $_SESSION["userFirstName"] = $dataFromResponse["prenom_user"];
                            $_SESSION["userLastName"] = $dataFromResponse["nom_user"];
                            $_SESSION["userPhone"] = $dataFromResponse["telephone_user"];
                            $_SESSION["userEmail"] = $dataFromResponse["email_user"];
                            header('Location:/pages/admin_dashboard/accueil.php');
                            exit();
                        } else {
                            //Boite alert
                            echo '<div class="alert alert-danger" role="alert">
                                    Mot de passe incorrect
                                </div>';
                        }
                    } else {
                        //PAGE INFORMATION DE REDIRECTION VERS LE SITE UTILISATEUR
                        header('Location:/pages/redirect_userWebsite.php');
                    }
                } else {
                    //Boite alert
                    echo '<div class="alert alert-danger" role="alert">
                        Email inexistant
                        </div>';
                }
            }
            ?>

            <div class="connexion">
                <h2>CONNEXION</h2>
                <form action="#" method="post">
                    <div class="input_group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $email ?>" placeholder="anonymous@email.com">
                    </div>
                    <div class="input_group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="*******">
                    </div>
                    <button id="submitBtn" type="submit">Se connecter</button>
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