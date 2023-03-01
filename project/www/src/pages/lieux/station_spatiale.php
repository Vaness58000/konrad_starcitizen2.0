<?php
require __DIR__ . '/../../../back/connexion.php';
include __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxPlaneteRepository = new LieuxRepository();
$type = $lieuxPlaneteRepository->findIdTypeLieu("Stations spatiales");
$planete = $lieuxPlaneteRepository->findAllCatId($type);
/*css planete.css*/
?>

<div class="container_lune">
  <?php foreach ($planete as $construct) { ?>
    <div class="equipement_indiv">
      <a href="?ind=station_spatiale_ind&id=<?= $construct['id_objet']; ?>">
        <?php
        $lieuxPlanete_img = $lieuxPlaneteRepository->findAllImgObj($construct["id_objet"]);
        if (count($lieuxPlanete_img) >= 1) {
        ?>
          <img src="src/img/<?= $lieuxPlanete_img[0]['name'] ?>" alt="<?= $lieuxPlanete_img[0]['alt'] ?>"></a>
    <?php } ?>
    <div class="centered"><?= $construct['nom_obj'] ?></div>
    </a>
    </div>
<?php } ?>
</div>