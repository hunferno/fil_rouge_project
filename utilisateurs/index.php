<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="icon" href="./asset/favicon.ico" />
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <div class="nav_container">
            <div class="nav_icone">
                <i class="fas fa-bars fa-2x"></i>
                <i class="fas fa-times fa-2x"></i>
            </div>
            <nav>
                <ul>
                    <a href="">
                        <li>Services & infos pratiques</li>
                    </a>
                    <a href="">
                        <li>Agenda</li>
                    </a>
                    <a href="">
                        <li>Cinéma</li>
                    </a>
                    <a href="">
                        <li>Bibliothèque numérique</li>
                    </a>
                </ul>
            </nav>
            <div class="profile_icone">
                <i class="fas fa-user-alt fa-2x"></i>
            </div>
        </div>
        <div class="logo_container">
            <a href=""><img src="asset/LOGO.jpg" alt="logo"></a>
            <h1>Médiathèque du Sud</h1>
        </div>
        <!-- Bar de recherche Bootstrap-->
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Rechercher un livre" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </header>
    <main>
        <section class="main_nouveautes">
            <div class="nouveautes_title">
                <h2>Le(s) dernier(s) livre(s) ajouté(s)</h2>
            </div>
            <div class="nouveautes_content">
                <!-- SEPARATEUR CERCLE -->
                <div class="separateur">
                    <div class="cercle"></div>
                </div>
                <!-- FIN SEPARATEUR CERCLE -->
                <div class="book_title">
                    <h3>La fille de papier</h3>
                </div>
                <div class="book">
                    <div class="book_info">
                        <p><span>Auteur : </span>Guillaume MUSSO</p>
                        <p><span>Date de parution : </span>01/04/2010</p>
                        <p><span>Description : </span><br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, aspernatur non. Incidunt ea harum at enim tempore eos labore assumenda.
                        </p>
                    </div>
                    <div class="book_img">
                        <img src="asset/lafilledepapier.jpg" alt="la fille de papier">
                    </div>
                </div>
                <!-- SEPARATEUR DIAMAND -->
                <div class="separateur">
                    <div class="diamand"></div>
                </div>
                <!-- FIN SEPARATEUR DIAMAND -->
            </div>
            <div class="nouveautes_content">
                <div class="book_title">
                    <h3>La fille de papier</h3>
                </div>
                <div class="book">
                    <div class="book_info">
                        <p><span>Auteur : </span>Guillaume MUSSO</p>
                        <p><span>Date de parution : </span>01/04/2010</p>
                        <p><span>Description : </span><br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, aspernatur non. Incidunt ea harum at enim tempore eos labore assumenda.
                        </p>
                    </div>
                    <div class="book_img">
                        <img src="asset/lafilledepapier.jpg" alt="la fille de papier">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer></footer>
    <script src="javascript/index.js"></script>
</body>

</html>