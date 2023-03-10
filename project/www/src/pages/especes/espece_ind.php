<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/EspecesRepository.php';
$especesRepository = new EspecesRepository();
$espece = $especesRepository->findAllAndIdUser($_GET['id']);
$tous_espece = $especesRepository->findAllNoId($_GET['id']);
?>

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
          <p><?= str_replace("\n", "<br/>", $espece['contenu']) ?></p>

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
                    <div class="blog-card2">

                        <div class="meta">
                            <?php
                            $especes_img = $especesRepository->findAllImgObj($tous["id_objet"]);
                            if (count($especes_img) >= 1) {
                            ?>
                                <div class="photo" style="background-image: url(src/img/<?= $especes_img[0]['name'] ?>" ;><a href="?ind=espece_ind&id=<?= $tous["id_objet"]; ?>"></a></div>
                            <?php } ?>

                        </div>
                        <div class="description">
                            <h2><a href="?ind=espece_ind&id=<?= $tous["id_objet"]; ?>"><?= $tous['nom_obj']; ?></a></h2>
                            <ul class="postcard__tagbox">
                                <li class="tag__item">Espèce</li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
  </section>
</div>