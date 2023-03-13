<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxVilleRepository = new LieuxRepository();
$type = $lieuxVilleRepository->findIdTypeLieu("Villes");
$lieuxVille = $lieuxVilleRepository->findAllCatIdLieuId($_GET['id'], $type);
$tous_ville = $lieuxVilleRepository->findAllCatIdNoId($_GET['id'], $type);
?>
<section class="page_generale">
    <?php foreach ($lieuxVille as $ville) { ?>
        <div class="info_generale">
            <h1><?= $ville['nom_lieu'] ?></h1>
            <div class="description_generale">

                <?php
                $lieuxVille_img = $lieuxVilleRepository->findAllImgObj($ville["id_objet"]);
                if (count($lieuxVille_img) >= 1) {
                ?>
                    <img src="./upload/lieux/<?= $lieuxVille_img[0]['src'] ?>" alt="<?= $lieuxVille_img[0]['alt'] ?>"></a>
                <?php } ?>
                <div class="description_generale">
                    <p class="bbcode"><?= str_replace("\n", "<br/>", $ville['contenu']) ?></p>

                </div>
            </div>

            <div class="caracteristique">
                <table>
                    <?php
                    $lieuxVille_info_img = $lieuxVilleRepository->findAllInfObj($ville["id_objet"]);

                    foreach ($lieuxVille_info_img as $construct_inf) { ?>
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
                $lieuxVille_img = $lieuxVilleRepository->findAllImgObj($ville["id_objet"]);

                foreach ($lieuxVille_img as $construct_img) { ?>
                    <img src="./upload/lieux/<?= $construct_img['src'] ?>" alt="Ville <? $ville['nom_lieu'] ?>" />
                <?php } ?>

            </div>
            <div class="voir_aussi">
                <h2 class="centered">Voir aussi</h2>
                <?php foreach ($tous_ville as $tous) { ?>
                    <div class="blog-card">

                        <div class="meta">
                            <?php
                            $lieu_img = $lieuxVilleRepository->findAllImgObj($tous["id_objet"]);
                            if (count($lieu_img) >= 1) {
                            ?>
                                <div class="photo" style="background-image: url(./upload/lieux/<?= $lieu_img[0]['name'] ?>" ;><a href="?ind=ville_ind&id=<?= $tous["id_objet"]; ?>"></a></div>
                            <?php } ?>

                        </div>
                        <div class="description">
                            <h2><a href="?ind=ville_ind&id=<?= $tous["id_objet"]; ?>"><?= $tous['nom_obj']; ?></a></h2>
                            <ul class="postcard__tagbox">
                                <li class="tag__item">Système</li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
</section>
<?php
    }
?>