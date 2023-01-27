<?php
session_start();
require("back/connexion.php");

include 'header.php';


/*css planete.css*/
?>

<section class="page_planete">
<h1><img src="img/account_corners.png" alt="deco">&ensp; Les Villes</h1>
    <div class="container_planete">
   
  <div class="card">
    <a href="ville_area18.php"><img src="img/ville.jpg" alt="ville Area 18">
    <div class="card__head">Area18</div></a>
  </div>
  <div class="card">
    <a href="ville_lorville.php"><img src="img/ville22.jpg" alt="ville Lorville">
    <div class="card__head">Lorville</div></a>
  </div>
  <div class="card">
    <a href="ville_newbabbage.php"><img src="img/ville23.jpg" alt="ville New Babbage">
    <div class="card__head">New Babbage</div></a>
  </div>
</section>
<?php
include 'footer.php';
?>
<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>
</body>

</html>