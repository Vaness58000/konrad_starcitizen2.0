<?php
require __DIR__.'/../../../back/connexion.php';
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxSystemeRepository = new LieuxRepository();
$type = $lieuxSystemeRepository->findIdTypeLieu("Systèmes");
$lieuxSysteme = $lieuxSystemeRepository->findAllCatIdLieuId($_GET['id'], $type);

?>
<div class="block">
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
                        <p><?= str_replace("\n", "<br/>", $systeme['contenu']) ?></p>

                    </div>
                </div>
    </section>
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
<div class="gallery_planete">
    <?php
            $lieuxSysteme_img = $lieuxSystemeRepository->findAllImgObj($systeme["id_objet"]);

            foreach ($lieuxSysteme_img as $construct_img) { ?>
        <img src="src/img/<?= $construct_img['name'] ?>" alt="Systeme <? $systeme['nom_lieu'] ?>" />
    <?php } ?>

</div>
<?php
        }
?>