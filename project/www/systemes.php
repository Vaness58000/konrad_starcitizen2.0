<?php
session_start();
require("back/connexion.php");

include 'header.php';


/*css planete.css*/
?>

<section class="page_presentation">

  <div class="container_categorie">

    <div class="card">
      <a href="systeme.php"><img src="img/systeme.png" alt="systeme stanton">
        <div class="card__head">Système Stanton</div>
      </a>
    </div>
    <div class="card">
      <a href="systeme.php"><img src="img/systeme_pyro.png" alt="systeme stanton">
        <div class="card__head">Système Pyro</div>
      </a>
    </div>
</section>
<?php
include 'footer.php';
?>
<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>
</body>

</html>