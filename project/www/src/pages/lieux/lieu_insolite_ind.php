<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxInsoliteRepository = new LieuxRepository();
$type = $lieuxInsoliteRepository->findIdTypeLieu("Lieux insolites");
$lieuxInsolite = $lieuxInsoliteRepository->findAllCatIdLieuId($_GET['id'], $type);
$tous_lieu = $lieuxInsoliteRepository->findAllCatIdNoId($_GET['id'], $type);
?>


<section class="page_generale">
    <?php foreach ($lieuxInsolite as $lune) { ?>
        <div class="info_generale">
            <h1><?= $lune['nom_lieu'] ?></h1>
            <div class="description_generale">

                <?php
                $lieuxInsolite_img = $lieuxInsoliteRepository->findAllImgObj($lune["id_objet"]);
                if (count($lieuxInsolite_img) >= 1) {
                ?>
                    <img src="./upload/lieux/<?= $lieuxInsolite_img[0]['src'] ?>" alt="<?= $lieuxInsolite_img[0]['alt'] ?>"></a>
                <?php } ?>
                <div class="description_generale">
                    <p class="bbcode"><?= str_replace("\n", "<br/>", $lune['contenu']) ?></p>

                </div>
            </div>

            <div class="caracteristique">
                <table>
                    <?php
                    $lieuxInsolite_info_img = $lieuxInsoliteRepository->findAllInfObj($lune["id_objet"]);

                    foreach ($lieuxInsolite_info_img as $construct_inf) { ?>
                        <tr>
                            <td><?= $construct_inf['nom'] ?></td>
                            <td class="td_text_pad">
                                <div class="td_text"><?= str_replace("\n", "<br/>", $construct_inf['info']) ?></div>
                            </td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td>
                                Lier à 
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                </table>

            </div>
            <div id="gallery_planete">
                <?php
                $lieuxInsolite_img = $lieuxInsoliteRepository->findAllImgObj($lune["id_objet"]);

                foreach ($lieuxInsolite_img as $construct_img) { ?>
                    <img src="./upload/lieux/<?= $construct_img['src'] ?>" alt="lune <? $lune['nom_obj'] ?>" />
                <?php } ?>

            </div>
            <div class="voir_aussi">
                <h2 class="centered">Voir aussi</h2>
                <?php foreach ($tous_lieu as $tous) { ?>
                    <div class="blog-card">

                        <div class="meta">
                            <?php
                            $lieu_img = $lieuxLuneRepository->findAllImgObj($tous["id_objet"]);
                            if (count($lieu_img) >= 1) {
                            ?>
                                <div class="photo" style="background-image: url(src/img/<?= $lieu_img[0]['name'] ?>" ;><a href="?ind=lieu_insolite_ind&id=<?= $tous["id_objet"]; ?>"></a></div>
                            <?php } ?>

                        </div>
                        <div class="description">
                            <h2><a href="?ind=lieu_insolite_ind&id=<?= $tous["id_objet"]; ?>"><?= $tous['nom_obj']; ?></a></h2>
                            <ul class="postcard__tagbox">
                                <li class="tag__item">Lieu insolite</li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
</section>
<?php
    }
?>