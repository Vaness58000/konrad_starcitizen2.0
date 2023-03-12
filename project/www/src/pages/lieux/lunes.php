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
$nomb_art = 10;
$lieuxLuneRepository = new LieuxRepository();
$type = $lieuxLuneRepository->findIdTypeLieu("Lunes");
$nomb = $lieuxLuneRepository->findAllAndCatIdCount($type);
$nomb_page = ceil($nomb / $nomb_art);
$lieuxLune = $lieuxLuneRepository->findAllAndCatIdPage($type, $pg, $nomb_art);
/*css systeme.css*/
?>

<div class="container_lune">

    <?php foreach ($lieuxLune as $construct) { ?>
        <div class="equipement_indiv">
            <a href="?ind=lune_ind&id=<?= $construct['id_objet']; ?>">
                <?php
                $lieuxLune_img = $lieuxLuneRepository->findAllImgObj($construct["id_objet"]);
                if (count($lieuxLune_img) >= 1) {
              ?>
                <img src="src/img/<?= $lieuxLune_img[0]['name'] ?>" alt="<?= $lieuxLune_img[0]['alt'] ?>"></a>
                <?php } ?>
            <div class="centered"><?= $construct['nom_obj'] ?></div>
        </div>
    <?php
    }
    ?>
</div>
<ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=lunes&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>