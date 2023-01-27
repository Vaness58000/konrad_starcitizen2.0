<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konrad Star citizen</title>
  <link rel="stylesheet" href="../css/style-header.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/vaisseau.css">
  <link rel="stylesheet" href="../css/vaisseau_ind.css">
  <link rel="stylesheet" href="../css/contact.css">
  <link rel="stylesheet" href="../css/planete.css">
  <link rel="stylesheet" href="../css/systeme.css">
  <link rel="stylesheet" href="../css/ville.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/civilisation.css">
  <link rel="stylesheet" href="../css/actualites.css">
  <link rel="stylesheet" href="../css/compte.css">
  <link rel="stylesheet" href="../css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/3cff230019.js" crossorigin="anonymous"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
  <link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
  body {
    background-image: url(fond_accueil.jpg);
    background-size: cover 100%;
    background-repeat: no-repeat;
  }

  .start {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 800px;
  }

  .start a img {
    width: 300px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .start a img:hover {
    width: 350px;
    /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  }
</style>

<body>

  <div class="menu-container">
    <div class="menu">
      <a href="../index.php" class="logo"><img src="../img/logo1.png" alt=""></a>
      <ul class="clearfix">
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="#">Actualités</a>
          <ul>
            <li><a href="../actualites.php">Toutes les actus</a></li>
            <li><a href="#">Patch Notes</a></li>
          </ul>
        </li>
        <li><a href="#">Guide</a>
          <ul>
            <li><a href="#">Equipements</a>
              <ul>
                <li><a href="../vaisseau.php">Vaisseaux</a></li>
                <li><a href="../vehicule.php">Véhicules</a></li>
                <li><a href="#">Armes</a></li>
              </ul>
            </li>
            <li><a href="#">Lieux</a>
              <ul>
                <li><a href="../planete.php">Planètes</a></li>
                <li><a href="../systeme.php">Système</a></li>
                <li><a href="../lunes.php">Lunes</a></li>
                <li><a href="../ville.php">Villes</a></li>
                <li><a href="../station_spatiale.php">Stations spaciales</a></li>
                <li><a href="#">Lieux insolites</a></li>
              </ul>
            </li>
            <li><a href="#">Espèces</a>
              <ul>
                <li><a href="#">Personnages</a></li>
                <li><a href="../civilisation.php">Civilisations</a></li>
              </ul>
            </li>
            <li><a href="#">Gallerie</a>
              <ul>
                <li><a href="../gallerie.php"><img src="../img/262f7041f0f5f688_1920xH.jpg"></a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#">Forum</a></li>
        <li><a href="space-shooter_game/index.html">Mini-jeu</a></li>
        <li><a href="">Liens utiles</a>
          <ul>
            <li><a href="#">School</a>
              <ul>
                <li><a href="https://robertsspaceindustries.com/starmap" target="_blank">Starmap</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="#">Careers</a></li>
              </ul>
            </li>
            <li><a href="#">Study</a>
              <ul>
                <li><a href="#">Undergraduate</a></li>
                <li><a href="#">Masters</a></li>
                <li><a href="#">International</a></li>
                <li><a href="#">Online</a></li>
              </ul>

            </li>
            <li><a href="#">Study</a>
              <ul>
                <li><a href="#">Undergraduate</a></li>
                <li><a href="#">Masters</a></li>
                <li><a href="#">International</a></li>
                <li><a href="#">Online</a></li>
              </ul>
            </li>
            <li><a href="#">Squadron 42</a>
              <ul>
                <li><a href="../esquadron.php"><img src="../img/wallpaperflare.com_wallpaper (7).jpg"></a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="../contact.php">Contact</a></li>
        <li><a href="#">Mon compte</a>
          <ul>
            <?php if (!isset($_SESSION['user'])) { ?>
              <li><a href="../login.php">Connexion</a></li>
              <li><a href="../inscription.php"> Inscription</a></li>
            <?php } else { ?>
              <li><a href="../espace_user.php">Gèrer mes partages</a></li>
              <li><a href="../deconnexion.php"> Déconnexion</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div>

    <div class="start">
      <a href="spaceshooter.html"><img src="start.png" alt=""></a>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="../js/script.js"></script>
</body>

</html>