<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/EspecesRepository.php';
$especesRepository = new EspecesRepository();
$especes = $especesRepository->findAllAndIdUser($_GET['id']);
//$tous_espece = $especesRepository->findAllAndTypeUserNoId($type, $_GET["id"]);
?>
<div class="block">
    <section class="page_generale">
        <?php foreach ($especes as $espece) { ?>
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
<div class="caracteristique">
    <table>
        <?php
            $especes_info_img = $especesRepository->findAllInfObj($espece["id_objet"]);

            foreach ($especes_info_img as $construct_inf) { ?>
            <tr>
                <td><?= $construct_inf['nom'] ?></td>
                <td class="td_text_pad">
                    <div class="td_text"><?= str_replace("\n", "<br/>", $construct_inf['info']) ?></div>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>
<div class="gallery_espece">
    <?php
            $especes_img = $especesRepository->findAllImgObj($espece["id_objet"]);

            foreach ($especes_img as $construct_img) { ?>
        <img src="src/img/<?= $construct_img['name'] ?>" alt="espece <? $espece['nom_obj'] ?>" />
    <?php } ?>

</div>
<?php
        }
?>
   <div class="voir_aussi">
                    <h2 class="centered">Voir aussi</h2>
                 
</div>