<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArmeFpsRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 10;
$armeFpsRepository = new ArmeFpsRepository();
$nomb = $armeFpsRepository->findAllAndArmeIdCount();
$nomb_page = ceil($nomb / $nomb_art);
$armeFps = $armeFpsRepository->findAllAndArmeIdPage($pg, $nomb_art);
?>


<section class="page_equipement">
  <div class="container_arme">

  <?php foreach ($armeFps as $construct) { ?>

      <div class="arme_indiv">
        <a href="?ind=arme_ind&id=<?= $construct['id_objet']; ?>">
          <?php $armeFps_img = $armeFpsRepository->findAllImgObj($construct["id_objet"]); 
          if (count($armeFps_img) >= 1) {?>
          <img src="src/img/<?= $armeFps_img[0]['name'] ?>" alt="<?= $construct['nom_obj'] ?>"></a>
          <?php } ?>
        <div class="centered"><?= $construct['nom_obj'] ?></div>

      </div>
    <?php
    }
    ?>
  </div>
  <ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=armes&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>
</section>
