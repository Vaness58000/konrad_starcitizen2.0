<?php
require __DIR__ . '/../../../back/connexion.php';
include __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxSystemeRepository = new LieuxRepository();
$type = $lieuxSystemeRepository->findIdTypeLieu("Systèmes");
$systeme = $lieuxSystemeRepository->findAllCatId($type);
/*css planete.css*/
?>

<section class="page_presentation">

  <div class="container_categorie">
  <?php foreach ($systeme as $construct) { ?>
    <div class="card">
      <a href="?ind=systeme_ind&id=<?= $construct['id_objet']; ?>">
      <?php
        $lieuxSysteme_img = $lieuxSystemeRepository->findAllImgObj($construct["id_objet"]);
        if (count($lieuxSysteme_img) >= 1) {
        ?>
          <img src="src/img/<?= $lieuxSysteme_img[0]['name'] ?>" alt="<?= $lieuxSysteme_img[0]['alt'] ?>"></a>
    <?php } ?>
        <div class="card__head"><?= $construct['nom_obj'] ?></div>
      </a>
    </div>
    <?php } ?>
  </div>
</section>

<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>
