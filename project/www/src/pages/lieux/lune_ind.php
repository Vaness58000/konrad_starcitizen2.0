<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxLuneRepository = new LieuxRepository();
$type = $lieuxLuneRepository->findIdTypeLieu("Lunes");
$lieuxLune = $lieuxLuneRepository->findAllCatIdLieuId($_GET['id'], $type);
?>


<div class="block">
    <section class="page_generale">
        <?php foreach ($lieuxLune as $lune) { ?>
            <div class="info_generale">
                <h1><?= $lune['nom_lieu'] ?></h1>
                <div class="description_generale">

                    <?php
                    $lieuxLune_img = $lieuxLuneRepository->findAllImgObj($lune["id_objet"]);
                    if (count($lieuxLune_img) >= 1) {
                    ?>
                        <img src="src/img/<?= $lieuxLune_img[0]['name'] ?>" alt="<?= $lieuxLune_img[0]['alt'] ?>"></a>
                    <?php } ?>
                    <div class="description_generale">
                        <p><?= str_replace("\n", "<br/>", $lune['contenu']) ?></p>

                    </div>
                </div>
    </section>
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
<div class="gallery_planete">
    <?php
            $lieuxLune_img = $lieuxLuneRepository->findAllImgObj($lune["id_objet"]);

            foreach ($lieuxLune_img as $construct_img) { ?>
        <img src="src/img/<?= $construct_img['name'] ?>" alt="lune <? $lune['nom_obj'] ?>" />
    <?php } ?>

</div>
<?php
        }
?>