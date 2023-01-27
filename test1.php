<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konrad_StarCitizen</title>
    <link rel="stylesheet" href="css/style-header.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/vaisseau.css">
    <link rel="stylesheet" href="css/vaisseau_ind.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/planete.css">
    <link rel="stylesheet" href="css/systeme.css">
    <link rel="stylesheet" href="css/ville.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/civilisation.css">
    <link rel="stylesheet" href="css/actualites.css">
    <link rel="stylesheet" href="css/compte.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/3cff230019.js" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <nav>
        <div class="wrapper_menu">
            <div class="logo"><a href="index.php"><img src="img/logo1.png" alt="Logo star citizen"></a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li><a href="index.php">Accueil</a></li>
                <li>
                    <a href="#" class="desktop-item">Actualités</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Actualités</label>
                    <ul class="drop-menu">
                        <li><a href="actualites.php">Toutes les actus</a></li>
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
                                <img src="img/fond3.jpg" alt="">
                            </div>
                            <div class="row">
                                <header>Equipements</header>
                                <ul class="mega-links">
                                    <li><a href="vaisseau.php">Vaisseaux</a></li>
                                    <li><a href="vehicule.php">Véhicules</a></li>
                                    <li><a href="vaisseau.php">Equipements</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <header>Lieux</header>
                                <ul class="mega-links">
                                    <li><a href="planete.php">Planètes</a></li>
                                    <li><a href="systeme.php">Système</a></li>
                                    <li><a href="lunes.php">Lunes</a></li>
                                    <li><a href="ville.php">Villes</a></li>
                                    <li><a href="station_spatiale.php">Stations spaciales</a></li>
                                    <li><a href="#">Lieux insolites</a></li>


                                </ul>
                            </div>
                            <div class="row">
                                <header>Personnages</header>
                                <ul class="mega-links">
                                    <li><a href="#">Personnages</a></li>
                                    <li><a href="civilisation.php">Civilisations</a></li>
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
                        <li><a href="test.php">Drop menu 3</a></li>
                        <li><a href="#">Drop menu 4</a></li>
                    </ul>
                </li>

                <li><a href="space-shooter_game/index.html">Mini-jeu</a></li>
                <li><a href="forum/index.php" target="_blank">Forum</a></li>

                <li><a href="contact.php">Contact</a></li>
                <li>
                    <a href="#" class="desktop-item"><i class="fa-solid fa-user-astronaut"></i>&ensp;Mon compte</a>
                    <input type="checkbox" id="showDrop3">
                    <label for="showDrop3" class="mobile-item"><i class="fa-solid fa-user-astronaut"></i>&ensp;Mon compte</label>
                    <ul class="drop-menu3">
                        <?php if (!isset($_SESSION['user'])) { ?>
                            <li><a href="login.php">Connexion</a></li>
                            <li><a href="inscription.php"> Inscription</a></li>
                        <?php } else { ?>
                            <li><a href="espace_user.php">Gèrer mes partages</a></li>
                            <li><a href="deconnexion.php"> Déconnexion</a></li>
                        <?php } ?>
                       
                    </ul>
                </li>

            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>