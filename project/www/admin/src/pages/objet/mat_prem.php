<?php
require __DIR__.'/header_objet.php';
include __DIR__.'/../../../../src/repository/MatierePremiereRepository.php';

$lieuxRepository = new MatierePremiereRepository();
$id_type = $lieuxRepository->findIdTypeMatierePremiere();
$nom_pg = "Matière première";
$count_obj = ceil($lieuxRepository->findAllAndUserIdCount($id_type, intval($id))/$nb_par_pg);
$objets = $lieuxRepository->findAllAndUserIdPage($id_type, intval($id), $page, $nb_par_pg);

if($isAdmin) {
    $choix_tab = choiceTab("./?ind=mat_prem", "./?ind=mat_prem_all");
}

if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $count_obj = ceil($lieuxRepository->findAllAndUserCount($id_type)/$nb_par_pg);
    $objets = $lieuxRepository->findAllAndUserPage($id_type, $page, $nb_par_pg);
}

$templatePage->addFileJs("./src/js/objet/mat_prem.js");
/*$templatePage->addFileJs("./src/js/tab_display_all.js");*/

require __DIR__.'/objet.php';
