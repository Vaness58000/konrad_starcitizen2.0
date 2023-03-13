<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/VaisseauRepository.php';
require __DIR__ . '/../../../src/repository/ConstructeurRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 10;
$constructeurRepository = new ConstructeurRepository();
$nomb = $constructeurRepository->findAllAndConstructeurIdCount();
$nomb_page = ceil($nomb / $nomb_art);
$construct_tab = $constructeurRepository->findAllAndConstructeurIdPage($pg, $nomb_art);

?>

<div class="container_construct">

    <?php foreach ($construct_tab as $construct) { ?>
        <div class="construct_indiv">

        <a href="?ind=constructeur_ind&id=<?= $construct['id_constructeur']; ?>">
           
            <div class="image_construct">
          <img src="./upload/constructeurs/<?= $construct['image'] ?>" alt="">
            </div>
            <div id="logo_constructeur">
                <img src="./upload/constructeurs_logo/<?= $construct["logo"] ?>" alt="logo <?= $construct['nom'] ?>">
            </div>
            
            </a>
        </div>
    <?php
    }
    ?>

</div>
<ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=constructeur&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>
</section>
<script src="src/js/script_filtre_vaisseau.js"></script>