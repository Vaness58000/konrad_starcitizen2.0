<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__.'/../../../src/repository/EspecesRepository.php';
$especeRepository = new EspecesRepository;
$especes = $especeRepository->findAll();
?>

<section class="page_generale">

  <h1>Civilisations</h1>
  <div class="info_generale">
    <img src="src/img/civil8.jpg">

    <p>Les espèces avancées, au sein du dantesque arbre des espèces de la galaxie, sont celles qui, par leur développement du fait de facteurs particuliers, ont développé une intelligence qui dépasse la simple sentience animale. Ces espèces interagissent au travers de schémas sociaux complexes, et utilisent des objets plutôt que ce dont la nature les a doté, afin d'optimiser un travail. Leur complexité et leur prise de conscience d'eux-même les a placé sur une pente ascendante vers le rang d'espèce à la supériorité intellectuelle indéniable.</p>
  </div>
  <div class="info_generale">
    <h2>Civilisations</h2>
    <p>Les "Civilisations" sont les espèces ayant atteint le stade, par développement social, culturel et scientifique, de la Civilisation. Ces espèces en sont généralement à l'ère du voyage spatial, et ont donc transcendé les frontières de leur monde d'origine. Leurs technologies sont avancées et pointues, et leur culture est puissante.</p>
    <div class="civilisation">
    <?php foreach ($especes as $construct) { ?>
      <div class="especes hero">
        <a href="?ind=espece_ind&id=<?= $construct['id_objet']; ?>"> 
          <?php
        $especes_img = $especeRepository->findAllImgObj($construct["id_objet"]);
        if (count($especes_img) >= 1) {
        ?>
          <img class="hero-profile-img" src="src/img/<?= $especes_img[0]['name'] ?>" alt="<?= $especes_img[0]['alt'] ?>"></a>
    <?php } ?>
        <div class="hero-description-bk"></div>
        <div class="hero-title">
          <a href="?ind=espece_ind&id=<?= $construct['id_objet']; ?>"><?= $construct['nom_obj'] ?></a>
        </div>
      </div>
      <?php } ?>
      
</section>