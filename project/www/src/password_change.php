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
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konrad Star citizen</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
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
  <link rel="stylesheet" href="../css/squadron.css">
  <link rel="stylesheet" href="../css/partage_screen.css">
  <link rel="stylesheet" href="../css/gallerie.css">
  <link rel="stylesheet" href="../css/gestion_screen.css">
  <link rel="stylesheet" href="../css/rgpd.css">
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

<body>

  <div class="menu-container">
    <div class="menu">
      <a href="../index.php" class="logo"><img src="../img/logo1.png" alt="logo du site nemesis of daymar"></a>
      <ul class="clearfix">
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="#">Actualités</a>
          <ul>
            <li><a href="../actualites.php">Toutes les actus</a></li>
            <li><a href="../patch_note.php">Patch Notes</a></li>
          </ul>
        </li>
        <li><a href="#">Guide</a>
          <ul>
            <li><a href="#">Equipements</a>
              <ul>
                <li><a href="../vaisseau.php">Vaisseaux</a></li>
                <li><a href="../vehicule.php">Véhicules</a></li>
                <li><a href="../arme.php">Armes</a></li>
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
                <li><a href="../civilisation.php">Civilisations</a></li>
                <li><a href="../humain.php">Humain</a></li>
                <li><a href="../vanduul.php">Vanduul</a></li>
                <li><a href="../banu.php">Banu</a></li>
                <li><a href="../Xian.php">Xi'an</a></li>
                <li><a href="../tevarin.php">Tevarin</a></li>
              </ul>
            </li>
            <li><a href="../gallerie.php">Gallerie</a>
              <ul>
                <li><a href="../gallerie.php"><img src="../img/262f7041f0f5f688_1920xH.jpg"></a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="../forum/index.php" target="_blank">Forum</a></li>
        <li><a href="../space-shooter_game/index.php">Mini-jeu</a></li>
        <li><a href="#">Liens utiles</a>
          <ul>
            <li><a href="https://robertsspaceindustries.com/starmap" target="_blank">Starmap</a></li>
            <li><a href="https://robertsspaceindustries.com/download" target="_blank">Roberts space industries</a></li>
            <li><a href="https://robertsspaceindustries.com/pledge" target="_blank">Achats des vaisseaux</a></li>
            <li><a href="esquadron.php">Squadron 42<img src="img/wallpaperflare.com_wallpaper (7).jpg"></a></li>
          </ul>
        </li>

        <li><a href="contact.php">Contact</a></li>
        <li><a href="#"><i class="fa-solid fa-user-astronaut"></i>&ensp; Mon compte</a>
          <ul>
            <?php if (!isset($_SESSION['user'])) { ?>
              <li><a href="login.php">Connexion</a></li>
              <li><a href="inscription.php"> Inscription</a></li>
            <?php } else { ?>
              <li><a href="espace_user.php">Gérer mon profil</a></li>
              <li><a href="partage.php">Partager des screens</a></li>
              <li><a href="deconnexion.php"> Déconnexion</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div>
    <button onclick="retourHaut()" id="haut" title="Retour haut de page"><img src="../img/fleche.png" alt="fleche retour haut de page"></button>
  </div>
  <section id="html">
    <div id="logo">
      <h1><i> Connexion</i></h1>
    </div>
    <section class="container-login">

      <form action="password_change_post.php" method="post">
        <div id="fade-box">
          <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>" required />
          <input id="login-input-password" class="login__input" type="password" name="password" placeholder="Nouveau mot de passe" autocomplete="off" required />
          <input id="login-input-password" class="login__input" type="password" name="password_repeat" placeholder="Confirmer mot de passe" autocomplete="off" required />
          <input type="submit" value="Enregistrer"></input>
        </div>
      </form>

    </section>

    <div id="circle1">
      <div id="inner-cirlce1">
        <h2> </h2>
      </div>
    </div>

  </section>

  <footer>
    <div class="footer-content">
      <img src="img/logo1.png" alt="logo star citizen">
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
          <li><a href="info_legale.php">Informations légales</a></li>
          <li><a href="cgu.php">CGU</a></li>
          <li><a href="politique_confi.php">Politique de confidentialités</a></li>
        </ul>
      </div>
      <p>Copyright &copy;2023 Star citizen - Tous droits réservés </p>
    </div>

  </footer>

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
</body>

</html>