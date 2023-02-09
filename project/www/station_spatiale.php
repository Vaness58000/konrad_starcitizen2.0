<?php
session_start();
require("back/connexion.php");

include 'header.php';


/*css planete.css*/
?>

<section class="page_planete">
  <h1>Les stations spatiales</h1>
  <div class="container_planete">

    <div class="card">
      <a href="ville_area18.php"><img src="img/station.jpg" alt="station spatiale Port Olisar">
        <div class="card__head">Port Olisar</div>
      </a>
    </div>
    <div class="card">
      <a href="ville_lorville.php"><img src="img/station2.jpg" alt="station spatiale Covalex Shipping Hub Gundo">
        <div class="card__head">Covalex Shipping Hub Gundo</div>
      </a>
    </div>
    <div class="card">
      <a href="ville_newbabbage.php"><img src="img/station3.jpg" alt="station spatiale Security Post Kareah">
        <div class="card__head">Security Post Kareah</div>
      </a>
    </div>
    <div class="card">
      <a href="ville_newbabbage.php"><img src="img/station4.jpg" alt="station spatiale GrimHEX">
        <div class="card__head">GrimHEX</div>
      </a>
    </div>
</section>
<?php
include 'footer.php';
?>
<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>
</body>

</html>