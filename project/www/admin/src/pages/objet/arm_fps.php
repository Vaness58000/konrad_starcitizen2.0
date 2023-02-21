<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/ArmeFpsRepository.php';

$id_type = 1;
$nom_pg = "Armements FPS";
$armeFpsRepository = new ArmeFpsRepository();
$count_obj = ceil($armeFpsRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $armeFpsRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = '<div class="card-buttons_user">'.
                    '<a href="./?ind=arm_fps">Mes contributions</a>'.
                    '<a href="./?ind=arm_fps_all">Toutes les contributions</a>'.
                '</div>';
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($armeFpsRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $armeFpsRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/arm_fps.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

require __DIR__.'/objet.php';
