<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/EspecesRepository.php';

$especesRepository = new EspecesRepository();
$id_type = $especesRepository->findIdTypeEspece();
$nom_pg = "Espèces";
$count_obj = ceil($especesRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $especesRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = choiceTab("./?ind=especes", "./?ind=especes_all");
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($especesRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $especesRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/objet/especes.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';
