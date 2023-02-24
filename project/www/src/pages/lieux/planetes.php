<?php 
require __DIR__ . '/../../../back/connexion.php';
include __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxVilleRepository = new LieuxRepository();
$ville = $lieuxVilleRepository->findAllCat(6);
/*css planete.css*/
?>
<section class="page_presentation">

  <div class="container_categorie">
    <?php foreach ($ville as $construct) { ?>
      <div class="card">
        <a href="?ind=planete_ind&id=<?= $construct['id']; ?>">
          <?php
          $lieuxVille_img = $lieuxVilleRepository->findAllImgObj($construct["id_objet"]);
          if (count($lieuxVille_img) >= 1) {
          ?>
            <img src="src/img/<?= $lieuxVille_img[0]['name'] ?>" alt="<?= $lieuxVille_img[0]['alt'] ?>"></a>
      <?php } ?>
      <div class="card__head"><?= $construct['nom_lieu'] ?></div>
      </a>
      </div>

    <?php } ?>
</section>
<script type="text/javascript" src="src/js/script_filtre_vaisseau.js"></script>