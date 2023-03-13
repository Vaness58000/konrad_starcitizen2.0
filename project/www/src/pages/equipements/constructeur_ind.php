<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/TransportRepository.php';
require __DIR__ . '/../../../src/repository/ConstructeurRepository.php';
require __DIR__ . '/../../../src/repository/VaisseauRepository.php';
require __DIR__ . '/../../../src/repository/ArmeFpsRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
    $pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
    $pg = 0;
}
$nomb_art = 3;
$nomb = 0;
$constructeurRepository = new ConstructeurRepository();
$construct_tabs = $constructeurRepository->findAllAndIdConstructeur($_GET['id']);
$transportRepository = new TransportRepository();
$id_vehicule = $transportRepository->findIdTypeTransports("vehicule");
$id_vaiss = $transportRepository->findIdTypeTransports("vaisseau");
if (!isset($_GET["type_transp"])) {
    $transports = $transportRepository->findAllAndUserConstructeurId($_GET['id']);
    //$nomb = $articleRepository->findAllAndTypeUserCount($type);
} else {
    $transports = $transportRepository->findAllAndConstructIdPage($_GET["type_transp"], $_GET['id']);
    //$nomb = $articleRepository->findAllAndTypeUserCount($type);
}
$nomb_page = ceil($nomb / $nomb_art);
?>


<div class="container_contructeur">
    <h1><img src="src/img/<?= $construct_tabs['logo']; ?>">&ensp;<?= $construct_tabs['nom']; ?></h1>

    <div class="info_construct">
        <img src="src/img/<?= $construct_tabs['image']; ?>" alt="<?= $construct_tabs['nom']; ?>">

        <p><?= str_replace("\n", "<br/>", $construct_tabs['contenu']); ?></p>

    </div>
</div>




<div class="container_categorie_construct">
    <ul class="menu_categorie_construct">
        <li class="categorie_item_construct">
            <span class="item_inner_construct">
                <span class="item_title_construct"><a href="./?ind=constructeur_ind&id=<?= $_GET['id'] ?>">Tous</a></span>
            </span>
        </li>
        <li class="categorie_item_construct">
            <span class="item_inner_construct">
                <span class="item_title_construct"><a href="./?ind=constructeur_ind&type_transp=<?= $id_vaiss ?>&id=<?= $_GET['id'] ?>">Vaisseaux</a></span>
            </span>
        </li>
        <li class="categorie_item_construct">
            <span class="item_inner_construct">
                <span class="item_title_construct"><a href="./?ind=constructeur_ind&type_transp=<?= $id_vehicule ?>&id=<?= $_GET['id'] ?>">Véhicules</a></span>
            </span>
        </li>
    </ul>
</div>
<div class="equipement_transport_construct">
    <div class="section_categorie">
        <h1 class="centered2">Les transports <?= $construct_tabs['nom']; ?></h1>
        <hr>
    </div>

    <div class="container_equipement">

        <?php foreach ($transports as $transport) { ?>
            <div class="equipement_indiv">

                <a href="?ind=transport_ind&id=<?= $transport['id_objet']; ?>"> <?php $transport_img = $transportRepository->findAllImgObj(intval($transport["id_objet"]));

                                                                                if (count($transport_img) >= 1) {
                                                                                ?><img src="src/img/<?= $transport_img[0]["src"] ?>" alt="vaisseau<?= $transport['nom_obj'] ?>"></a>
            <?php } ?>
            <div class="centered"><?= $transport['nom_obj']; ?></div>
            </div>

        <?php
        }
        ?>

    </div>
</div>
<ul class="pagination">
    <?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
        <?php if (!isset($_GET["type_transp"])) { ?>
            <li><a href="?ind=constructeur_ind&id=<?= $_GET['id'] ?>&pg=<?= $i ?>"><?= $i ?></a></li>
        <?php } else { ?>
            <li><a href="?ind=constructeur_ind&type_transp=<?= $id_vaiss ?>&id=<?= $_GET['id'] ?>&pg=<?= $i ?>"><?= $i ?></a></li>

    <?php }
    } ?>
</ul>
</section>
<script src="src/js/script_filtre_vaisseau.js"></script>