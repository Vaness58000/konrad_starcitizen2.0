<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/ServicesRepository.php';

$servicesRepository = new ServicesRepository();
$id_type = $servicesRepository->findIdTypeServices();
$nom_pg = "Services";
$count_obj = ceil($servicesRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $servicesRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = choiceTab("./?ind=services", "./?ind=services_all");
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($servicesRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $servicesRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/objet/services.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';
