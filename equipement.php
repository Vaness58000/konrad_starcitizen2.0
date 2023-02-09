<?php
session_start();
require "back/connexion.php";
include "header.php";

?>

<section class="page_planete">
 

  <div class="container_planete">
  
      <div class="card">
        <a href="vaisseau.php"><img src="img/vaisseau_illustration.jpg">
          <div class="card__head">Vaisseaux</div>
        </a>
      </div>
      <div class="card">
        <a href="vehicule.php"><img src="img/vehicule_illustration.jpg">
          <div class="card__head">Véhicules</div>
        </a>
      </div>
      <div class="card">
        <a href="arme.php"><img src="img/arme_illustration.jpg">
          <div class="card__head">Armes</div>
        </a>
      </div>


  </div>
</section>


<?php
include "footer.php";
?>