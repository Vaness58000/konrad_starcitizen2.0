<?php
require __DIR__.'/../../../back/connexion.php';

/*css planete.css*/
?>

<section class="page_presentation">
  <h1>Les stations spatiales</h1>
  <div class="container_categorie">

    <div class="card">
      <a href="?ind=station_spatiale_ind"><!--rajouter &id=--><img src="src/img/station.jpg" alt="station spatiale Port Olisar">
        <div class="card__head">Port Olisar</div>
      </a>
    </div>
    <div class="card">
      <a href="?ind=station_spatiale_ind"><img src="src/img/station2.jpg" alt="station spatiale Covalex Shipping Hub Gundo">
        <div class="card__head">Covalex Shipping Hub Gundo</div>
      </a>
    </div>
    <div class="card">
      <a href="?ind=station_spatiale_ind"><img src="src/img/station3.jpg" alt="station spatiale Security Post Kareah">
        <div class="card__head">Security Post Kareah</div>
      </a>
    </div>
    <div class="card">
      <a href="?ind=station_spatiale_ind"><img src="src/img/station4.jpg" alt="station spatiale GrimHEX">
        <div class="card__head">GrimHEX</div>
      </a>
    </div>
</section>

<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>
