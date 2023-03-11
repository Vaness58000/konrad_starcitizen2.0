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
$lieuxSystemeRepository = new LieuxRepository();
$type = $lieuxSystemeRepository->findIdTypeLieu("Systèmes");
$nomb = $lieuxSystemeRepository->findAllAndCatIdCount($type);
$nomb_page = ceil($nomb / $nomb_art);
$systeme = $lieuxSystemeRepository->findAllAndCatIdPage($type, $pg, $nomb_art);

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
<ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=systemes&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>
<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>

