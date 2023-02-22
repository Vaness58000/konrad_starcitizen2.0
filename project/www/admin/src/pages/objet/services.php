<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/ServicesRepository.php';

$id_type = 6;
$nom_pg = "Services";
$servicesRepository = new ServicesRepository();
$count_obj = ceil($servicesRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $servicesRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = '<div class="card-buttons_user">'.
                    '<a href="./?ind=services">Mes contributions</a>'.
                    '<a href="./?ind=services_all">Toutes les contributions</a>'.
                '</div>';
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($servicesRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $servicesRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/services.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';