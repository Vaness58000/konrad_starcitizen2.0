<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/EspecesRepository.php';
$especesRepository = new EspecesRepository();
$espece = $especesRepository->findAllAndIdUser($_GET['id']);
$tous_espece = $especesRepository->findAllNoId($_GET['id']);
?>
<style>
  .card-gallery_voir_autre { 
  justify-content: center;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(365px, 365px));
   grid-row-gap: 5rem;
    grid-column-gap: 1rem; 
}
/* card */
.card_voir_autre {
  position: relative;
  /*  afin de pouvoir placer les cartes les unes a cote des autres  */
  display: inline-block;
/*   width: 420px;
  height: 500px; */
  background-color: white;
/*   border: 1px solid gray; */
/*   margin-bottom: 30px; */
  border-radius: 6px;
  color: rgba(0,0,0, 0.87);
  background-color: rgb(255, 255, 255);
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

.card-img_voir_autre {
  position: relative;
  background-color: orange;
  height: 80%;
  overflow: hidden;
  margin-left: 15px;
  margin-right: 15px;
  margin-top: -40px;
  border-radius: 6px;
  box-shadow: 0 16px 38px -12px
  rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.card-img_voir_autre img {
  display: block;
  width: 100%;
  max-width: 100%;
}

.card-content_voir_autre {
  padding: 15px 35px;
  font-family: 'Lucida Sans', sans-serif;
}

.card-title_voir_autre {
  font-family: 'Lucida Sans', sans-serif;
  font-size: 0.9em;
text-transform: uppercase;
font-weight: 700;
  padding-top: 10px;
  padding-bottom: 10px;
}

</style>

<div class="block">
  <section class="page_generale">
    <div class="info_generale">
      <h1><?= $espece['nom_obj'] ?></h1>
      <div class="description_generale">

        <?php
        $especes_img = $especesRepository->findAllImgObj($espece["id_objet"]);
        if (count($especes_img) >= 1) {
        ?>
          <img src="src/img/<?= $especes_img[0]['name'] ?>" alt="<?= $especes_img[0]['alt'] ?>"></a>
        <?php } ?>
        <div class="description_generale">
          <p class="bbcode
          "><?= str_replace("\n", "<br/>", $espece['contenu']) ?></p>

        </div>
      </div>


      <div class="caracteristique">
        <table>

          <tr>
          <tr>
            <th>gouvernance</th>
            <th><?= $espece['gouvernence']
                ?></th>
          </tr>
          <tr>
            <td>Souveraineté</td>
            <td><?= $espece['souverainete'] ?></td>
          </tr>
          <tr>
            <td>Philosophie</td>
            <td><?= $espece['philosophie']
                ?></td>
          </tr>
          <tr>
            <td>Religion</td>
            <td><?= $espece['religion'] ?></td>
          </tr>
          <tr>
            <td>1er contact</td>
            <td><?= $espece['pre_contact'] ?></td>
          </tr>
          <tr>
            <td>Origine</td>
            <td><?= $espece['origine'] ?></td>
          </tr>

        </table>

      </div>
      <div id="gallery_planete">
        <?php
        $especes_img = $especesRepository->findAllImgObj($espece["id_objet"]);

        foreach ($especes_img as $espece_img) { ?>
          <img src="src/img/<?= $espece_img['name'] ?>" alt="espece <? $espece['nom_obj'] ?>" />
        <?php } ?>

      </div>
      <div class="voir_aussi">
        <h2 class="centered">Voir aussi</h2>

        <?php foreach ($tous_espece as $tous) { ?>
          <!--<div class="card-gallery_voir_autre">
            <div class="card_voir_autre">
              <div class="card-img_voir_autre">
              <?php
         /* $especes_img = $especesRepository->findAllImgObj($tous["id_objet"]);
          if (count($especes_img) >= 1) {*/
          ?>
                <img src="src/img/<?php //$especes_img[0]['src'] ?>" alt="<?php //$tous['nom_obj']; ?>">
                <?php //} ?>
              </div>
              <div class="card-content_voir_autre">
                <div class="card-title_voir_autre"><a href="?ind=espece_ind&id=<?php //$tous["id_objet"]; ?>"><?php // $tous['nom_obj']; ?></a></div>
              </div>
            </div>
          </div>
      </div>-->
      <div class="voir_aussi_container">
      <div class="especes hero">
          <a href="?ind=espece_ind&id=<?= $tous['id_objet']; ?>">
            <?php
            $especes_img = $especesRepository->findAllImgObj($tous["id_objet"]);
            if (count($especes_img) >= 1) {
            ?>
              <img id="hero-profile-img" src="src/img/<?= $especes_img[0]['name'] ?>" alt="<?= $especes_img[0]['alt'] ?>"></a>
        <?php } ?>
        <div class="hero-description-bk"></div>
        <div class="hero-title">
          <a href="?ind=espece_ind&id=<?= $tous['id_objet']; ?>" class="centered2"><?= $tous['nom_obj'] ?></a>
        </div>
        </div>
       
    <?php } ?>
    </div>
  </section>
</div>