<header>
    <div class="logo">
        <a href="/index.php"><img src="../asset/LOGO.jpg" alt="logo du site"></a>
        <h1>Médiathèque du Sud</h1>
    </div>

    <?php
    if (isset($_SESSION['userFirstName'])) {
        $userFirstName = $_SESSION["userFirstName"];
        $userLastName = $_SESSION["userLastName"];
        echo "
        <div class='profile'>
        <h3>Bienvenue $userFirstName $userLastName</h3>
        <a href='../clientActions/deconnect.php'><i class='fas fa-sign-out-alt fa-2x'></i></a>
        </div>
        ";
    }
    ?>

</header>