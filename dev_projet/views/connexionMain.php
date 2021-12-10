<?php
// ZONE DE TEST
// $test = mktime(0, 0, 0, date("d"), date("m"), date('Y'));
// $date_inscription = date("Y.m.d", strtotime('+5 year'));
// $expiration_abonnement = date($test);
// var_dump($date_inscription);
// die();

// REDIRECTION SI SESSION EXISTE
if (!empty($_SESSION['userPhone'])) {
    header('Location:index.php?entite=redirection&action=redirectHome');
    exit();
}
?>

<main id="main_index">
    <?php echo $erreur ?>
    <div class="connexion">
        <h2>CONNEXION</h2>
        <form action="index.php?entite=user&action=connexion" method="post">
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