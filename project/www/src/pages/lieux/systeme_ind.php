<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxSystemeRepository = new LieuxRepository();
$type = $lieuxSystemeRepository->findIdTypeLieu("Systèmes");
$lieuxSysteme = $lieuxSystemeRepository->findAllCatIdLieuId($_GET['id'], $type);
$tous_systeme = $lieuxSystemeRepository->findAllCatIdNoId($_GET['id'], $type);
?>

<section class="page_generale">
    <?php foreach ($lieuxSysteme as $systeme) { ?>
        <div class="info_generale">
            <h1><?= $systeme['nom_lieu'] ?></h1>
            <div class="description_generale">

                <?php
                $lieuxSysteme_img = $lieuxSystemeRepository->findAllImgObj($systeme["id_objet"]);
                if (count($lieuxSysteme_img) >= 1) {
                ?>
                    <img src="src/img/<?= $lieuxSysteme_img[0]['name'] ?>" alt="<?= $lieuxSysteme_img[0]['alt'] ?>"></a>
                <?php } ?>
                <div class="description_generale">
                    <p class="bbcode"><?= str_replace("\n", "<br/>", $systeme['contenu']) ?></p>

                </div>
            </div>

            <div class="caracteristique">
                <table>
                    <?php
                    $lieuxSysteme_info_img = $lieuxSystemeRepository->findAllInfObj($systeme["id_objet"]);

                    foreach ($lieuxSysteme_info_img as $construct_inf) { ?>
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
                $lieuxSysteme_img = $lieuxSystemeRepository->findAllImgObj($systeme["id_objet"]);

                foreach ($lieuxSysteme_img as $construct_img) { ?>
                    <img src="src/img/<?= $construct_img['name'] ?>" alt="Systeme <? $systeme['nom_lieu'] ?>" />
                <?php } ?>

            </div>
            <div class="voir_aussi">
                <h2 class="centered">Voir aussi</h2>
                <?php foreach ($tous_systeme as $tous) { ?>
                    <div class="blog-card">

                        <div class="meta">
                            <?php
                            $lieu_img = $lieuxSystemeRepository->findAllImgObj($tous["id_objet"]);
                            if (count($lieu_img) >= 1) {
                            ?>
                                <div class="photo" style="background-image: url(src/img/<?= $lieu_img[0]['name'] ?>" ;><a href="?ind=systeme_ind&id=<?= $tous["id_objet"]; ?>"></a></div>
                            <?php } ?>

                        </div>
                        <div class="description">
                            <h2><a href="?ind=systeme_ind&id=<?= $tous["id_objet"]; ?>"><?= $tous['nom_obj']; ?></a></h2>
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