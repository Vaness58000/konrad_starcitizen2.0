<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxStationSpatiale = new LieuxRepository();
$type = $lieuxStationSpatiale->findIdTypeLieu("Stations spatiales");
$lieuxSpatiale = $lieuxStationSpatiale->findAllCatIdLieuId($_GET['id'], $type);
$tous_stations = $lieuxStationSpatiale->findAllCatIdNoId($_GET['id'], $type);
?>

<section class="page_generale">
    <?php foreach ($lieuxSpatiale as $systeme) { ?>
        <div class="info_generale">
            <h1><?= $systeme['nom_lieu'] ?></h1>
            <div class="description_generale">

                <?php
                $lieuxSpatiale_img = $lieuxStationSpatiale->findAllImgObj($systeme["id_objet"]);
                if (count($lieuxSpatiale_img) >= 1) {
                ?>
                    <img src="./upload/lieux/<?= $lieuxSpatiale_img[0]['src'] ?>" alt="<?= $lieuxSpatiale_img[0]['alt'] ?>"></a>
                <?php } ?>
                <div class="description_generale">
                    <p class="bbcode"><?= str_replace("\n", "<br/>", $systeme['contenu']) ?></p>

                </div>
            </div>

            <div class="caracteristique">
                <table>
                    <?php
                    $lieuxSpatiale_info_img = $lieuxStationSpatiale->findAllInfObj($systeme["id_objet"]);

                    foreach ($lieuxSpatiale_info_img as $construct_inf) { ?>
                        <tr>
                            <td><?= $construct_inf['nom'] ?></td>
                            <td class="td_text_pad">
                                <div class="td_text"><?= str_replace("\n", "<br/>", $construct_inf['info']) ?></div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
            <div class="gallery_planete">
                <?php
                $lieuxSpatiale_img = $lieuxStationSpatiale->findAllImgObj($systeme["id_objet"]);

                foreach ($lieuxSpatiale_img as $construct_img) { ?>
                    <img src="./upload/lieux/<?= $construct_img['src'] ?>" alt="Systeme <? $systeme['nom_lieu'] ?>" />
                <?php } ?>
            </div>
            <div class="voir_aussi">
                    <h2 class="centered">Voir aussi</h2>
                    <?php foreach ($tous_stations as $tous) { ?>
                        <div class="blog-card">

                            <div class="meta">
                                <?php
                                $lieu_img = $lieuxStationSpatiale->findAllImgObj($tous["id_objet"]);
                                if (count($lieu_img) >= 1) {
                                ?>
                                    <div class="photo" style="background-image: url(./upload/lieux/<?= $lieu_img[0]['src'] ?>" ;><a href="?ind=station_spatiale_ind&id=<?= $tous["id_objet"]; ?>"></a></div>
                                <?php } ?>

                            </div>
                            <div class="description">
                                <h2><a href="?ind=station_spatiale_ind&id=<?= $tous["id_objet"]; ?>"><?= $tous['nom_obj']; ?></a></h2>
                                <ul class="postcard__tagbox">
                                    <li class="tag__item">Station Spatiale</li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
            </div>
</section>

<?php
    }
?>