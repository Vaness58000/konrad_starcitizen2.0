<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';

$lieuxRepository = new LieuxRepository();
$id_type = $lieuxRepository->findIdTypeLieux();
$nom_pg = "Lieux";
$count_obj = ceil($lieuxRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $lieuxRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = choiceTab("./?ind=lieux", "./?ind=lieux_all");
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($lieuxRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $lieuxRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/lieux.js");
/*$templatePage->addFileJs("./src/js/tab_display_all.js");*/

require __DIR__.'/objet.php';
