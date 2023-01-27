<?php
session_start();
require "back/connexion.php";
include "header.php";
$id = strip_tags($_GET["id"]);
$sth2 = $dbco->prepare(" 
SELECT * 
FROM lieux WHERE id=:id");
$sth2->bindValue(":id", $id, PDO::PARAM_INT);
$sth2->execute();
/*Retourne un tableau associatif pour chaque entrée de notre table
*avec le nom des colonnes sélectionnées en clefs*/
$planetes = $sth2->fetchAll(PDO::FETCH_ASSOC);

?>
<section class="hurston">
  <?php foreach ($planetes as $planete) { ?>
    <h1><?= $planete['nom']; ?></h1>
    <div class="info_planete">
      <img src="img/<?= $planete['image']; ?>">
      <p><?= $planete['paragraphe1']; ?></p>
      <p><?= $planete['paragraphe2']; ?></p>
      <p><?= $planete['paragraphe3']; ?></p>
      <p><?= $planete['paragraphe4']; ?></p>
      <p><?= $planete['paragraphe5']; ?></p>
      <p><?= $planete['paragraphe6']; ?></p>
    </div>
    <div class="gallery_planete">
      <img src="img/<?= $planete['image1']; ?>">
      <img src="img/<?= $planete['image2']; ?>">
      <img src="img/<?= $planete['image3']; ?>">
      <img src="img/<?= $planete['image4']; ?>">
      <img src="img/<?= $planete['image5']; ?>">
      <img src="img/<?= $planete['image6']; ?>">

    </div>

  <?php
  }
  ?>
</section>

<?php
include "footer.php";
?>