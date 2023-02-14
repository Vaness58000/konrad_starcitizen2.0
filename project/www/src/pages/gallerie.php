<?php
require __DIR__.'/../../back/connexion.php';

$sth4 = $dbco->prepare("SELECT * FROM images");
$sth4->execute();

/*Retourne un tableau associatif pour chaque entrée de notre table
        *avec le nom des colonnes sélectionnées en clefs*/
$images = $sth4->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="photo-grid">
  <?php //Pour afficher les infos de la base de données 
  foreach ($images as $image) {    // foreach=boucle - pour afficher les données de la base de données dans un tableau/ as $= Pour afficher chaque resultat (les entrées de la base de données)
  ?>
    <div class="card_gallerie">

      <img src="upload/<?= ($image["name"]) ?>" />

      <div class="detail_user">
        <img id="avatar" src="img/avatar.png" alt="avatar utilisateur">
        <h4>Konrad</h4>
       <!-- <a href="action.php?t=1&id=<? $image["id_image"] ?>">J'aime</a>-->
      </div>

    </div>
  <?php } ?>
</div>
