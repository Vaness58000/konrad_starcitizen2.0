<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxLuneRepository = new LieuxRepository();
$type = $lieuxLuneRepository->findIdTypeLieu("Lunes");
$lieuxLune = $lieuxLuneRepository->findAllCatIdLieuId($_GET['id'], $type);
$lunes = $lieuxLuneRepository->findAllCatIdNoId($_GET['id'], $type);
?>

<section class="page_generale">
    <?php foreach ($lieuxLune as $lune) { ?>
        <div class="info_generale">
            <h1><?= $lune['nom_lieu'] ?></h1>
            <div class="description_generale">

                <?php
                $lieuxLune_img = $lieuxLuneRepository->findAllImgObj($lune["id_objet"]);
                if (count($lieuxLune_img) >= 1) {
                ?>
                    <img src="./upload/lieux/<?= $lieuxLune_img[0]['src'] ?>" alt="<?= $lieuxLune_img[0]['alt'] ?>"></a>
                <?php } ?>
                <div class="description_generale">
                    <p class="bbcode"><?= str_replace("\n", "<br/>", $lune['contenu']) ?></p>

                </div>
            </div>

            <div class="caracteristique">
                <table>
                    <?php
                    $lieuxLune_info_img = $lieuxLuneRepository->findAllInfObj($lune["id_objet"]);

                    foreach ($lieuxLune_info_img as $construct_inf) { ?>
                        <tr>
                            <td><?= $construct_inf['nom'] ?></td>
                            <td class="td_text_pad">
                                <div class="td_text"><?= str_replace("\n", "<br/>", $construct_inf['info']) ?></div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
            <div id="gallery_planete">
                <?php
                $lieuxLune_img = $lieuxLuneRepository->findAllImgObj($lune["id_objet"]);

                foreach ($lieuxLune_img as $construct_img) { ?>
                    <img src="./upload/lieux/<?= $construct_img['src'] ?>" alt="lune <? $lune['nom_obj'] ?>" />
                <?php } ?>

            </div>
            <div class="voir_aussi">
                <h2 class="centered">Voir aussi</h2>
                <?php foreach ($lunes as $tous) { ?>
                    <div class="blog-card2">

                        <div class="meta">
                            <?php
                            $lieu_img = $lieuxLuneRepository->findAllImgObj($tous["id_objet"]);
                            if (count($lieu_img) >= 1) {
                            ?>
                                <div class="photo" style="background-image: url(./upload/lieux/<?= $lieu_img[0]['src'] ?>" ;><a href="?ind=lune_ind&id=<?= $tous["id_objet"]; ?>"></a></div>
                            <?php } ?>

                        </div>
                        <div class="description">
                            <h2><a href="?ind=lune_ind&id=<?= $tous["id_objet"]; ?>"><?= $tous['nom_obj']; ?></a></h2>
                            <ul class="postcard__tagbox">
                                <li class="tag__item">Lune</li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
</section>
<?php
    }
?>