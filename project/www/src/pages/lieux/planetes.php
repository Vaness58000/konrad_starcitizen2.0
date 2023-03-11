<?php
require __DIR__ . '/../../../back/connexion.php';
include __DIR__ . '/../../../src/repository/LieuxRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 2;
$lieuxPlaneteRepository = new LieuxRepository();
$type = $lieuxPlaneteRepository->findIdTypeLieu("Planètes");
$nomb = $lieuxPlaneteRepository->findAllAndCatIdCount($type);
$nomb_page = ceil($nomb / $nomb_art);
$planete = $lieuxPlaneteRepository->findAllAndCatIdPage($type, $pg, $nomb_art);
/*css planete.css*/
?>

<div class="container_lune">
  <?php foreach ($planete as $construct) { ?>
    <div class="equipement_indiv">
      <a href="?ind=planete_ind&id=<?= $construct['id_objet']; ?>">
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
<ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=planetes&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>