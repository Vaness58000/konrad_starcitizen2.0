<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxPlaneteRepository = new LieuxRepository();
$type = $lieuxPlaneteRepository->findIdTypeLieu("Planètes");
$lieuxPlanete = $lieuxPlaneteRepository->findAllCatIdLieuId($_GET['id'], $type);
$planetes = $lieuxPlaneteRepository->findAllCatIdNoId($_GET['id'], $type);
?>
<section class="page_generale">
    <?php foreach ($lieuxPlanete as $planete) { ?>
        <div class="info_generale">
            <h1><?= $planete['nom_lieu'] ?></h1>
            <div class="description_generale">

                <?php
                $lieuxPlanete_img = $lieuxPlaneteRepository->findAllImgObj($planete["id_objet"]);
                if (count($lieuxPlanete_img) >= 1) {
                ?>
                    <img src="./upload/lieux/<?= $lieuxPlanete_img[0]['src'] ?>" alt="<?= $lieuxPlanete_img[0]['alt'] ?>"></a>
                <?php } ?>
                <div class="description_generale">
                    <p class="bbcode"><?= str_replace("\n", "<br/>", $planete['contenu']) ?></p>

                </div>
            </div>

            <div class="caracteristique">
                <table>
                    <?php
                    $lieuxPlanete_info_img = $lieuxPlaneteRepository->findAllInfObj($planete["id_objet"]);

                    foreach ($lieuxPlanete_info_img as $construct_inf) { ?>
                        <tr>
                            <td><?= $construct_inf['nom'] ?></td>
                            <td class="td_text_pad">
                                <div class="td_text"><?= str_replace("\n", "<br/>", $construct_inf['info']) ?></div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>


                <div id="gallery_planete">
                    <?php
                    $lieuxPlanete_img = $lieuxPlaneteRepository->findAllImgObj($planete["id_objet"]);

                    foreach ($lieuxPlanete_img as $construct_img) { ?>
                        <img src="./upload/lieux/<?= $construct_img['src'] ?>" alt="planete <? $planete['nom_lieu'] ?>" />
                    <?php } ?>

                </div>
                <div class="voir_aussi">
                    <h2 class="centered">Voir aussi</h2>
                    <div class="container_objet">
                        <?php foreach ($planetes as $tous) { ?>

                            <div class="card_objet">


                                <div id="image_objet">
                                    <a href="?ind=planete_ind&id=<?= $tous['id_objet']; ?>">
                                    <?php
                                $lieu_img = $lieuxPlaneteRepository->findAllImgObj($tous["id_objet"]);
                                if (count($lieu_img) >= 1) {
                                ?>
                                    <img src="./upload/lieux/<?= $lieu_img[0]['src'] ?>" alt="<?= $tous['nom_obj'] ?>">
                                <?php } ?>
                                </div>
                                <div id="nom_objet">
                                    <h3 class="centered2"><?= $tous['nom_obj'] ?></h3>
                                </div>
                                </a>

                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
               
</section>
<?php
    }
?>