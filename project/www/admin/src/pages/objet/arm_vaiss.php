<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/ArmeVaissRepository.php';

$armeVaissRepository = new ArmeVaissRepository();
$id_type = $armeVaissRepository->findIdTypeArm();
$nom_pg = "Armements vaisseau";
$count_obj = ceil($armeVaissRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $armeVaissRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = choiceTab("./?ind=arm_vaiss", "./?ind=arm_vaiss_all");
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($armeVaissRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $armeVaissRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/objet/arm_vaiss.js");
/*$templatePage->addFileJs("./src/js/tab_display_all.js");*/

require __DIR__.'/objet.php';
