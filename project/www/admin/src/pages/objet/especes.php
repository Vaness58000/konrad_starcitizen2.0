<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/EspecesRepository.php';

$id_type = 4;
$nom_pg = "Espèces";
$especesRepository = new EspecesRepository();
$count_obj = ceil($especesRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $especesRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = '<div class="card-buttons_user">'.
                    '<a href="./?ind=especes">Mes contributions</a>'.
                    '<a href="./?ind=especes_all">Toutes les contributions</a>'.
                '</div>';
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($especesRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $especesRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/especes.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';
