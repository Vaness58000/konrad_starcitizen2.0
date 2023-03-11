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
$nomb_art = 1;
$lieuxVilleRepository = new LieuxRepository();
$type = $lieuxVilleRepository->findIdTypeLieu("Villes");
$nomb = $lieuxVilleRepository->findAllAndCatIdCount($type);
$nomb_page = ceil($nomb / $nomb_art);
$ville = $lieuxVilleRepository->findAllAndCatIdPage($type, $pg, $nomb_art);

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
<ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=villes&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>