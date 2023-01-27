<?php
require_once __DIR__ . '../../back/connexion.php';
if (!empty($_GET['u'])) {
    $token = htmlspecialchars(base64_decode($_GET['u']));
    $check = $dbco->prepare('SELECT * FROM password_recover WHERE token_user = ?');
    $check->execute(array($token));
    $row = $check->rowCount();

    if ($row == 0) {
        echo "Lien non valide";
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="fr

">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reinitialisation mot de passe</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style-header.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://kit.fontawesome.com/3cff230019.js" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav>
        <div class="wrapper_menu">
            <div class="logo"><a href="../index.php"><img src="../img/logo1.png" alt="Logo star citizen"></a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li><a href="../index.php">Accueil</a></li>
                <li>
                    <a href="#" class="desktop-item">Actualités</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Actualités</label>
                    <ul class="drop-menu">
                        <li><a href="../actualites.php">Toutes les actus</a></li>
                        <li><a href="#">Patch Notes</a></li>
                    </ul>
                </li>
                <li>

                    <a href="#" class="desktop-item">Guide</a>
                    <input type="checkbox" id="showMega">
                    <label for="showMega" class="mobile-item">Guide</label>
                    <div class="mega-box">
                        <div class="content">
                            <div class="row">
                                <img src="../img/fond3.jpg" alt="">
                            </div>
                            <div class="row">
                                <header>Equipements</header>
                                <ul class="mega-links">
                                    <li><a href="../vaisseau.php">Vaisseaux</a></li>
                                    <li><a href="../vehicule.php">Véhicules</a></li>
                                    <li><a href="../vaisseau.php">Equipements</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <header>Lieux</header>
                                <ul class="mega-links">
                                    <li><a href="../planete.php">Planètes</a></li>
                                    <li><a href="../systeme.php">Système</a></li>
                                    <li><a href="../lunes.php">Lunes</a></li>
                                    <li><a href="../ville.php">Villes</a></li>
                                    <li><a href="../station_spatiale.php">Stations spaciales</a></li>
                                    <li><a href="#">Lieux insolites</a></li>


                                </ul>
                            </div>
                            <div class="row">
                                <header>Personnages</header>
                                <ul class="mega-links">
                                    <li><a href="#">Personnages</a></li>
                                    <li><a href="../civilisation.php">Civilisations</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </li>

                <li>
                    <a href="#" class="desktop-item">Liens</a>
                    <input type="checkbox" id="showDrop2">
                    <label for="showDrop2" class="mobile-item">Liens</label>
                    <ul class="drop-menu2">
                        <li><a href="https://robertsspaceindustries.com/starmap" target="_blank">Starmap</a></li>
                        <li><a href="#">Drop menu 3</a></li>
                        <li><a href="#">Drop menu 4</a></li>
                    </ul>
                </li>

                <li><a href="index.html">Mini-jeu</a></li>
                <li><a href="../forum/index.php" target="_blank">Forum</a></li>

                <li><a href="../contact.php">Contact</a></li>
                <li>
                    <a href="#" class="desktop-item"><i class="fa-solid fa-user-astronaut"></i>&ensp;Mon compte</a>
                    <input type="checkbox" id="showDrop3">
                    <label for="showDrop3" class="mobile-item"><i class="fa-solid fa-user-astronaut"></i>&ensp;Mon compte</label>
                    <ul class="drop-menu3">
                        <li><a href="../login.php">Se connecter</a></li>
                        <li><a href="../inscription.php">S'inscrire</a></li>
                    </ul>
                </li>

            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>
    <div class="login-container">

        <form action="password_change_post.php" method="post" class="form-login">

            <ul class="login-nav">
                <li class="login-nav__item active">
                    <a href="#">réinitialisation de votre mot de passe</a>
                </li>

            </ul>
            <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>" required />

            <label for="login-input-password" class="login__label">
                Nouveau mot de passe
            </label>
            <input id="login-input-password" class="login__input" type="password" name="password" autocomplete="off" required />
            <label for="login-input-password" class="login__label">
                Confirmer mot de passe
            </label>
            <input id="login-input-password" class="login__input" type="password" name="password_repeat" autocomplete="off" required />

            <input type="submit" value="Enregistrer"></input>
        </form>

    </div>


    <footer>
        <div class="footer-content">
            <img src="../img/logo1.png" alt="logo star citizen">
            <h3>Star Citizen</h3>
            <p>Communauté Star Citizen France. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">

            <div class="footer-menu">
                <ul class="f-menu">
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="">A propos</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                </ul>
            </div>
            <p>Copyright &copy;2023 Star citizen - Tous droits réservés </p>
        </div>

    </footer>
</body>

</html>