<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/TransportRepository.php';

$id_type = 2;
$nom_pg = "Transports";
$transportRepository = new TransportRepository();
$count_obj = ceil($transportRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $transportRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = '<div class="card-buttons_user">'.
                    '<a href="./?ind=transports">Mes contributions</a>'.
                    '<a href="./?ind=transports_all">Toutes les contributions</a>'.
                '</div>';
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($transportRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $transportRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/transports.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';
