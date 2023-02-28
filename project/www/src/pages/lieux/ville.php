<?php
require __DIR__ . '/../../../back/connexion.php';
include __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxVilleRepository = new LieuxRepository();
$type = $lieuxVilleRepository->findIdTypeLieu("Villes");
$ville = $lieuxVilleRepository->findAllCatId($type);
/*css Ville.css*/
?>

<div class="container_lune">
  <?php foreach ($ville as $construct) { ?>
    <div class="equipement_indiv">
      <a href="?ind=ville_ind&id=<?= $construct['id_objet']; ?>">
        <?php
        $lieuxVille_img = $lieuxVilleRepository->findAllImgObj($construct["id_objet"]);
        if (count($lieuxVille_img) >= 1) {
        ?>
          <img src="src/img/<?= $lieuxVille_img[0]['name'] ?>" alt="<?= $lieuxVille_img[0]['alt'] ?>"></a>
    <?php } ?>
    <div class="centered"><?= $construct['nom_obj'] ?></div>
    </a>
    </div>
<?php } ?>
</div>