<?php
// REDIRECTION SI SESSION EXISTE
if (!empty($_SESSION)) {
    header('Location:views/users/accueil.php');
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