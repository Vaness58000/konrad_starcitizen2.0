<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArmeFpsRepository.php';
$armeFpsRepository = new ArmeFpsRepository();
$armeFps = $armeFpsRepository->findAllId($_GET['id']);
?>

<section class="page_generale">
    <?php foreach ($armeFps as $construct) { ?>

        <div class="info_generale">

            <h1><?= $construct['nom_arm'] ?></h1>
            <?php 
                        $armeFps_img = $armeFpsRepository->findAllImgObj($construct["id_objet"]);

                        foreach ($armeFps_img as $construct_img) {?>
                                <img src="img/<?= $construct_img['name'] ?>" class="image" alt="<?= $construct['nom_arm'] ?>"/>
                        <?php } ?>
            <p><?= str_replace("\n", "<br/>",$construct['contenu']) ?></p>
           
            <div class="bouton">
                <a class="btn_actus" href="#"><span>Pledge Store</span></a>
            </div>
</section>

<table>
    <tr>
        <th>Catégorie</th>
        <th>???</th>
    </tr>
    <tr>
        <td>Prix</td>
        <td>???</td>
    </tr>
    <tr>
        <td>Disponibilité</td>
        <td>???</td>
    </tr>
    <tr>
        <td>Equipage</td>
        <td>???</td>
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


<?php
    }
?>