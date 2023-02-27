<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/ProprietairesRepository.php';

$proprietairesRepository = new ProprietairesRepository();
$id_type = $proprietairesRepository->findIdTypePropriet();
$nom_pg = "Propriétaires";
$count_obj = ceil($proprietairesRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $proprietairesRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = choiceTab("./?ind=proprietaires", "./?ind=proprietaires_all");
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($proprietairesRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $proprietairesRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/proprietaires.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';
