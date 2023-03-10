<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/EspecesRepository.php';
$especeRepository = new EspecesRepository;
$especes = $especeRepository->findAll();
?>
<style>.center-espece {
  transform: scale(1.5);
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.article-card-espece {
  width: 350px;
  height: 220px;
  border-radius: 12px;
  overflow: hidden;
  position: relative;
  font-family: Arial, Helvetica, sans-serif;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 300ms;
}

.article-card-espece:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.article-card-espece img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.article-card-espece .content {
  box-sizing: border-box;
  width: 100%;
  position: absolute;
  padding: 30px 20px 20px 20px;
  height: auto;
  bottom: 0;
  background: linear-gradient(transparent, rgba(0, 0, 0, 0.6));
}

.article-card-espece .title {
  margin: 0;
}


.article-card-espece .title-espece {
  font-size: 17px;
  color: #fff;
}</style>
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
        <!--<div class="center-espece">
          <div class="article-card-espece">
            <div class="content">
              <p class="title-espece"><?php // $construct['nom_obj'] ?></p>
            </div>
            <?php
            /*$especes_img = $especeRepository->findAllImgObj($construct["id_objet"]);
            if (count($especes_img) >= 1) {*/
            ?>
              <a href="?ind=espece_ind&id=<?php // $construct['id_objet']; ?>"><img class="hero-profile-img" src="src/img/<?= $especes_img[0]['name'] ?>" alt="<?= $especes_img[0]['alt'] ?>"></a>
        <?php //} ?>
          </div>
        </div>-->
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