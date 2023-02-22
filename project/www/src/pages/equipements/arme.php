<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArmeFpsRepository.php';
$armeFpsRepository = new ArmeFpsRepository();
$armeFps = $armeFpsRepository->findAll();
?>


<section class="page_equipement">
  <div class="container_arme">

  <?php foreach ($armeFps as $construct) { ?>

      <div class="arme_indiv">
        <a href="?ind=arme_ind&id=<?= $construct['id']; ?>">
          <?php $armeFps_img = $armeFpsRepository->findAllImgObj($construct["id_objet"]); 
          if (count($armeFps_img) >= 1) {?>
          <img src="src/img/<?= $armeFps_img[0]['name'] ?>" alt="<?= $construct['nom_arm'] ?>"></a>
          <?php } ?>
        <div class="centered"><?= $construct['nom_arm'] ?></div>

      </div>
    <?php
    }
    ?>
  </div>

</section>