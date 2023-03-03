<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/EspecesRepository.php';
$especesRepository = new EspecesRepository();
$espece = $especesRepository->findAllAndIdUser($_GET['id']);
//$tous_espece = $especesRepository->findAllAndTypeUserNoId($type, $_GET["id"]);
?>
<style>.tabbed {
  width: 700px;
  margin: 50px auto 200px auto;
}

.tabbed > input {
  display: none;
}

.tabbed > label {
  display: block;
  float: left;
  padding: 12px 20px;
  margin-right: 5px;
  cursor: pointer;
  transition: background-color .3s;
}

.tabbed > label:hover,
.tabbed > input:checked + label {
  background: #4EC6DE;
}

.tabs {
  clear: both;
  perspective: 600px;
}

.tabs > div {
  width: 700px;
  position: absolute;
  border: 2px solid #4EC6DE;
  padding: 10px 30px 40px;
  line-height: 1.4em;
  opacity: 0;
  transform: rotateX(-20deg);
  transform-origin: top center;
  transition: opacity .3s, transform 1s;
  z-index: 0;
}

#tab-nav-1:checked ~ .tabs > div:nth-of-type(1),
#tab-nav-2:checked ~ .tabs > div:nth-of-type(2),
#tab-nav-3:checked ~ .tabs > div:nth-of-type(3),
#tab-nav-4:checked ~ .tabs > div:nth-of-type(4){
  transform: rotateX(0);
  opacity: 1;
  z-index: 1;
}

@media screen and (max-width: 700px) {
  .tabbed { width: 400px }
  .tabbed > label { display: none }
  .tabs > div {
    width: 400px;
    border: none;
    padding: 0;
    opacity: 1;
    position: relative;
    transform: none;
    margin-bottom: 60px;
  }
  .tabs > div h2 {
    border-bottom: 2px solid #4EC6DE;
    padding-bottom: .5em;
  }
}</style>
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
    </section>
</div>
<div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">Gouvernance/Souveraineté</label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Philosophie/religion</label>
    <input type="radio" name="tabs" id="tab-nav-3">
    <label for="tab-nav-3">Origine</label>
    <input type="radio" name="tabs" id="tab-nav-4">
    <label for="tab-nav-4">1er contact</label>
    <div class="tabs">
      <div><h2>Gouvernance</h2><p><?= $espece['gouvernence'] ?></p><h2>Souveraineté</h2><p><?= $espece['souverainete'] ?></p></div>
      <div><h2>Philosophie</h2><p><?= $espece['philosophie'] ?></p><h2>Religion</h2><p><?= $espece['religion'] ?></p></div>
      <div><h2>Origine</h2><p><?= $espece['origine'] ?></p></div>
      <div><h2>Premier contact</h2><p><?= $espece['pre_contact'] ?></p></div>
    </div>
  </div>

<!--<div class="caracteristique">
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
<div class="gallery_planete">
    <?php
    $especes_img = $especesRepository->findAllImgObj($espece["id_objet"]);

    foreach ($especes_img as $espece_img) { ?>
        <img src="src/img/<?= $espece_img['name'] ?>" alt="espece <? $espece['nom_obj'] ?>" />
    <?php } ?>

</div>

<div class="voir_aussi">
    <h2 class="centered">Voir aussi</h2>

</div>-->