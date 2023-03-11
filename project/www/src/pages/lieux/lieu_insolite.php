<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 1;
$lieuxInsoliteRepository = new LieuxRepository();
$type = $lieuxInsoliteRepository->findIdTypeLieu("Lieux insolites");
$nomb = $lieuxInsoliteRepository->findAllAndCatIdCount($type);
$nomb_page = ceil($nomb / $nomb_art);
$lieuxInsolite = $lieuxInsoliteRepository->findAllAndCatIdPage($type, $pg, $nomb_art);
/*css systeme.css*/
?>

<div class="container_lune">

    <?php foreach ($lieuxInsolite as $construct) { ?>
        <div class="equipement_indiv">
            <a href="?ind=lieu_insolite_ind&id=<?= $construct['id_objet']; ?>">
                <?php
                $lieuxInsolite_img = $lieuxInsoliteRepository->findAllImgObj($construct["id_objet"]);
                if (count($lieuxInsolite_img) >= 1) {
              ?>
                <img src="src/img/<?= $lieuxInsolite_img[0]['name'] ?>" alt="<?= $lieuxInsolite_img[0]['alt'] ?>"></a>
                <?php } ?>
            <div class="centered"><?= $construct['nom_obj'] ?></div>
        </div>
    <?php
    }
    ?>
</div>
<ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=lieu_insolite&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>