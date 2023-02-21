<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/ArmeVaissRepository.php';

$id_type = 1;
$nom_pg = "Armements vaisseau";
$armeVaissRepository = new ArmeVaissRepository();
$count_obj = ceil($armeVaissRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $armeVaissRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = '<div class="card-buttons_user">'.
                    '<a href="./?ind=arm_vaiss">Mes contributions</a>'.
                    '<a href="./?ind=arm_vaiss_all">Toutes les contributions</a>'.
                '</div>';
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($armeVaissRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $armeVaissRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/arm_vaiss.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';
