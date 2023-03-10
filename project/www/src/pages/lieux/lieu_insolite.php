<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/LieuxRepository.php';
$lieuxLuneRepository = new LieuxRepository();
$type = $lieuxLuneRepository->findIdTypeLieu("Lieux insolites");
$lieuxLune = $lieuxLuneRepository->findAllCatId($type);
/*css systeme.css*/
?>

<div class="container_lune">

    <?php foreach ($lieuxLune as $construct) { ?>
        <div class="equipement_indiv">
            <a href="?ind=lieu_insolite_ind&id=<?= $construct['id_objet']; ?>">
                <?php
                $lieuxLune_img = $lieuxLuneRepository->findAllImgObj($construct["id_objet"]);
                if (count($lieuxLune_img) >= 1) {
              ?>
                <img src="src/img/<?= $lieuxLune_img[0]['name'] ?>" alt="<?= $lieuxLune_img[0]['alt'] ?>"></a>
                <?php } ?>
            <div class="centered"><?= $construct['nom_obj'] ?></div>
        </div>
    <?php
    }
    ?>
</div>