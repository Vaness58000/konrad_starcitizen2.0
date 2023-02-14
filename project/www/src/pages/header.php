<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konrad Star citizen</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="fonts/stylesheet.css">
  <link rel="stylesheet" href="css/style-header.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/equipement.css">
  <link rel="stylesheet" href="css/equipement_ind.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/planete.css">
  <link rel="stylesheet" href="css/systeme.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/civilisation.css">
  <link rel="stylesheet" href="css/articles.css">
  <link rel="stylesheet" href="css/compte.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/squadron.css">
  <link rel="stylesheet" href="css/partage_screen.css">
  <link rel="stylesheet" href="css/gallerie.css">
  <link rel="stylesheet" href="css/gestion_screen.css">
  <link rel="stylesheet" href="css/rgpd.css">
  <link rel="stylesheet" href="css/streamer.css">
  <link rel="stylesheet" href="css/patch_note.css">
  <link rel="stylesheet" href="css/lieu.css">
  <link rel="stylesheet" href="css/gameplay.css">
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

<body>

  <div class="wrapper_menu">
    
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
        <div class="logo"><a href="index.php"><img src="img/logo_test.png" alt=""></a></div>
        <ul class="links">
          <li><a class="radio" href="index.php">Accueil</a></li>
          <li>
            <a href="#" class="desktop-link radio">Actus</a>
            <input type="checkbox" id="show-actus">
            <label for="show-actus" class="radio">Actus</label>
            <ul>
              <li><a class="radio" href="?ind=actualites">Toutes les actus</a></li>
              <li><a class="radio" href="?ind=patch_note">Patch Notes</a></li>
            </ul>
          </li>
          <li>
            <a href="#" class="desktop-link radio">Guide</a>
            <input type="checkbox" id="show-guide">
            <label for="show-guide" class="radio">Guide</label>
            <ul class="deroulant">
              <li><a class="radio" href="?ind=equipements">Equipements</a></li>
              <li><a class="radio" href="?ind=lieux">Lieux</a></li>
              <li><a class="radio" href="?ind=especes">Espèces</a></li>
            </ul>
          </li>
          <li>
            <a href="#" class="desktop-link radio">Gameplay</a>
            <input type="checkbox" id="show-gameplay">
            <label for="show-gameplay" class="radio">Gameplay</label>
            <ul class="deroulant">
              <li><a class="radio" href="?ind=articles">Tous les articles</a></li>
              <li><a class="radio" href="?ind=gameplay">Streamer</a></li>
            </ul>
          </li>
          <li><a class="radio" href="?ind=gallerie">Gallerie</a></li>

          <li>
            <a href="#" class="desktop-link radio">Liens utiles</a>
            <input type="checkbox" id="show-liens">
            <label for="show-liens" class="radio">Liens utiles</label>
            <ul>
              <li><a class="radio" href="https://robertsspaceindustries.com/starmap" target="_blank">Starmap</a></li>
              <li><a class="radio" href="https://robertsspaceindustries.com/download" target="_blank">Roberts space industries</a></li>
              <li><a class="radio" href="?ind=squadron">Squadron 42</a></li>

            </ul>
          </li>

          <li>
            <a href="#" class="desktop-link radio">Mon compte</a>
            <input type="checkbox" id="show-compte">
            <label for="show-compte" class="radio">Mon compte</label>
            <ul>
              <?php if (!isset($_SESSION['user'])) { ?>
                <li><a class="radio" href="?ind=login">Connexion</a></li>
                <li><a class="radio" href="?ind=inscription"> Inscription</a></li>
              <?php } else { ?>
                <li><a class="radio" href="?ind=espace_user">Gérer mon profil</a></li>
                <li><a class="radio" href="?ind=partage">Partager des screens</a></li>
                <li><a class="radio" href="?ind=deconnexion"> Déconnexion</a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Taper votre recherche ..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    
    </nav>
  </div>
  <!-- Debut du code du traducteur de site Web de Google -->

  <!-- <li><a href="#">Guide</a>
          <ul>
            <li><a href="equipement.php">Equipements</a>
              <ul>
                <li><a href="vaisseau.php">Vaisseaux</a></li>
                <li><a href="vehicule.php">Véhicules</a></li>
                <li><a href="arme.php">Armes</a></li>
              </ul>
            </li>
            <li><a href="#">Lieux</a>
              <ul>
                <li><a href="planete.php">Planètes</a></li>
                <li><a href="systeme.php">Système</a></li>
                <li><a href="lunes.php">Lunes</a></li>
                <li><a href="ville.php">Villes</a></li>
                <li><a href="station_spatiale.php">Stations spaciales</a></li>
                <li><a href="#">Lieux insolites</a></li>
              </ul>
            </li>
            <li><a href="#">Espèces</a>
              <ul>
                <li><a href="civilisation.php">Civilisations</a></li>
                <li><a href="humain.php">Humain</a></li>
                <li><a href="vanduul.php">Vanduul</a></li>
                <li><a href="banu.php">Banu</a></li>
                <li><a href="Xian.php">Xi'an</a></li>
                <li><a href="tevarin.php">Tevarin</a></li>
              </ul>
            </li>
            <li><a href="gallerie.php">Gallerie</a>
              <ul>
                <li><a href="gallerie.php"><img src="img/262f7041f0f5f688_1920xH.jpg"></a></li>
              </ul>
            </li>
          </ul>
        </li>


  <li><a class="radio" href="contact.php">Contact</a></li>
  <li><a class="radio" href="#"> Mon compte</a>
    <ul>
      <?php if (!isset($_SESSION['user'])) { ?>
        <li><a class="radio" href="login.php">Connexion</a></li>
        <li><a class="radio" href="inscription.php"> Inscription</a></li>
      <?php } else { ?>
        <li><a class="radio" href="espace_user.php">Gérer mon profil</a></li>
        <li><a class="radio" href="partage.php">Partager des screens</a></li>
        <li><a class="radio" href="deconnexion.php"> Déconnexion</a></li>
      <?php } ?>
    </ul>
  </li>
  </ul>
  </div>
  </div>-->

  <div>
    <button onclick="retourHaut()" id="haut" title="Retour haut de page"><img src="img/fleche.png" alt="fleche retour haut de page"></button>
  </div>
  <div class="page">
    <script>
      window.onscroll = function() {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
          document.getElementById("haut").style.display = "block";
        } else {
          document.getElementById("haut").style.display = "none";
        }
      }

      function retourHaut() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="js/script.js"></script>