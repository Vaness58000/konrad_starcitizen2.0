<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatRisqueRepository.php';

$nom_pg = "Risques";

$categories = new CatRisqueRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdCatMain($value['id'], $value['nom']);
    }
}
$tabJS = array("./src/js/categories/cat_risque.js");

require __DIR__.'/categories_list.php';