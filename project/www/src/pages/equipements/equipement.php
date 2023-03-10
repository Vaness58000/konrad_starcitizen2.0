<?php
$id_vehicule = 2;
$id_vaiss = 1;
?>
<section class="page_presentation">
 

  <div class="container_categorie">
  
      <div class="card">
        <a href="?ind=transports&type_transp=<?= $id_vaiss ?>"><img src="src/img/vaisseau_illustration.jpg">
          <div class="card__head">Vaisseaux</div>
        </a>
      </div>
      <div class="card">
        <a href="?ind=transports&type_transp=<?= $id_vehicule ?>"><img src="src/img/vehicule_illustration.jpg">
          <div class="card__head">Véhicules</div>
        </a>
      </div>
      <div class="card">
        <a href="?ind=armes"><img src="src/img/arme_illustration.jpg">
          <div class="card__head">Armes</div>
        </a>
      </div>
      <div class="card">
        <a href="?ind=arme_vaisseau"><img src="src/img/armement_illustration.png">
          <div class="card__head">armements vaisseaux</div>
        </a>
      </div>

  </div>
</section>
<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>