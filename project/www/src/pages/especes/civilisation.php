<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/EspecesRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
  $pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
  $pg = 0;
}
$nomb_art = 10;
$especeRepository = new EspecesRepository;
$nomb = $especeRepository->findAllAndEspeceIdCount();
$nomb_page = ceil($nomb / $nomb_art);
$especes = $especeRepository->findAllAndEspeceIdPage($pg, $nomb_art);
?>
<section class="page_generale">


  <div class="info_generale">
    <h1 class="centered">Civilisations</h1>
    <img src="src/img/civil8.jpg">

    <p>Les espèces avancées, au sein du dantesque arbre des espèces de la galaxie, sont celles qui, par leur développement du fait de facteurs particuliers, ont développé une intelligence qui dépasse la simple sentience animale. Ces espèces interagissent au travers de schémas sociaux complexes, et utilisent des objets plutôt que ce dont la nature les a doté, afin d'optimiser un travail. Leur complexité et leur prise de conscience d'eux-même les a placé sur une pente ascendante vers le rang d'espèce à la supériorité intellectuelle indéniable.</p>
  </div>
  <div class="info_generale">
    <h3>Civilisations</h3>
    <p>Les "Civilisations" sont les espèces ayant atteint le stade, par développement social, culturel et scientifique, de la Civilisation. Ces espèces en sont généralement à l'ère du voyage spatial, et ont donc transcendé les frontières de leur monde d'origine. Leurs technologies sont avancées et pointues, et leur culture est puissante.</p>
    <div class="civilisation">
      <?php foreach ($especes as $construct) { ?>
        <div class="especes hero">
          <a href="?ind=espece_ind&id=<?= $construct['id_objet']; ?>">
            <?php
            $especes_img = $especeRepository->findAllImgObj($construct["id_objet"]);
            if (count($especes_img) >= 1) {
            ?>
              <img id="hero-profile-img" src="src/img/<?= $especes_img[0]['name'] ?>" alt="<?= $especes_img[0]['alt'] ?>"></a>
        <?php } ?>
        <div class="hero-description-bk"></div>
        <div class="hero-title">
          <a href="?ind=espece_ind&id=<?= $construct['id_objet']; ?>" class="centered2"><?= $construct['nom_obj'] ?></a>
        </div>
        </div>
      <?php } ?>

</section>
<ul class="pagination">
  <?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
    <li><a href="?ind=especes&pg=<?= $i ?>"><?= $i ?></a></li>
  <?php } ?>
</ul>