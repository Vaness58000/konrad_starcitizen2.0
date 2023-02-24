<?php
require __DIR__.'/../../../back/connexion.php';
/*css planete.css*/
?>

<section class="page_presentation">

  <div class="container_categorie">

    <div class="card">
      <a href="?ind=ville_ind"><img src="src/img/ville.jpg" alt="ville Area 18">
        <div class="card__head">Area18</div>
      </a>
    </div>
    <div class="card">
      <a href="?ind=ville_ind"><img src="src/img/ville22.jpg" alt="ville Lorville">
        <div class="card__head">Lorville</div>
      </a>
    </div>
    <div class="card">
      <a href="?ind=ville_ind"><img src="src/img/ville23.jpg" alt="ville New Babbage">
        <div class="card__head">New Babbage</div>
      </a>
    </div>
</section>
<script type="text/javascript" src="src/js/script_filtre_vaisseau.js"></script>
<?php /*
require __DIR__ . '/../../../back/connexion.php';
include __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxVilleRepository = new LieuxRepository();
$ville = $lieuxVilleRepository->findAllCat(5);
/*css planete.css*/
?>
<!--<section class="page_presentation">

  <div class="container_categorie">-->
    <?php /*foreach ($ville as $construct) { ?>
      <div class="card">
        <a href="?ind=ville_ind&id=<?php $construct["id"] ?>">
          <?php
          /*$lieuxVille_img = $lieuxVilleRepository->findAllImgObj($construct["id_objet"]);
          if (count($lieuxVille_img) >= 1) {
          ?>
            <img src="src/img/<?= $lieuxVille_img[0]['name'] ?>" alt="<?= $lieuxVille_img[0]['alt'] ?>"></a>
      <?php } ?>
      <div class="card__head"><?= $construct['nom_lieu'] ?></div>
      </a>
      </div>

    <?php } ?>
</section>*/


