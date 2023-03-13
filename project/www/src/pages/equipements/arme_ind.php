<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArmeFpsRepository.php';
$armeFpsRepository = new ArmeFpsRepository();
$construct = $armeFpsRepository->findAllId($_GET['id']);
$lieux_armes = $armeFpsRepository->findAllIdAndLieux($_GET['id']);
?>

<section class="page_generale">

        <div class="info_generale">

            <h1><?= $construct['nom_arm'] ?></h1>
            <?php
            $armeFps_img = $armeFpsRepository->findAllImgObj($construct["id_objet"]);

            foreach ($armeFps_img as $construct_img) { ?>
                <img src="./upload/armement_fps/<?= $construct_img['src'] ?>" class="image" alt="<?= $construct['nom_arm'] ?>" />
            <?php } ?>
            <p class="bbcode"><?= str_replace("\n", "<br/>", $construct['contenu']) ?></p>

            <div class="bouton">
                <a class="btn_actus" href="#"><span>Pledge Store</span></a>
            </div>


            <table>
                <tr>
                    <th>Catégorie</th>
                    <th><?= $construct['nom'] ?></th>
                </tr>
                <tr>
                    <th>Poids</th>
                    <th><?= $construct['poids'] ?></th>
                </tr>
                <tr>
                    <td>Pertes</td>
                    <td><?= $construct['perte'] ?></td>
                </tr>
                <tr>
                    <td>Portée</td>
                    <td><?= $construct['portee'] ?></td>
                </tr>
                <tr>
                    <td>Lieux d'achat</td>
                    <td><?= $lieux_armes['nom_lieu'] ?></td>
                </tr>
                <tr>
                    <td>Taille</td>
                    <td>???</td>
                </tr>
                <tr>
                    <td>Poids</td>
                    <td>???</td>
                </tr>
                <tr>
                    <td>Vitesse maximum</td>
                    <td>???</td>
                </tr>

            </table>
        </div>
</section>
