<?php
session_start();
require "back/connexion.php";
include "header.php";
$sth = $dbco->prepare("SELECT * FROM lieux");
$sth->execute();
$planetes = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="page_planete">
    <h1><img src="img/account_corners.png" alt="deco">&ensp; Les planètes du Système Stanton</h1>
 
    <div class="container_planete">
    <?php foreach ($planetes as $planete) { ?>
  <div class="card">
    <a href="hurston.php?id=<?= $planete['id']; ?>"><img src="img/<?= $planete['imageprincipale']; ?>">
    <div class="card__head"><?= $planete['nom']; ?></div></a>
  </div>
  <?php
            }
            ?>
 
  
</div>
</section>


<?php
include "footer.php";
?>