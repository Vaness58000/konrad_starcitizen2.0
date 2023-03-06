<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatForcesRepository.php';

$nom_pg = "Forces";

$categories = new CatForcesRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdCatMain($value['id_force'], $value['nom_force']);
    }
}
$tabJS = array("./src/js/categories/cat_forces.js");

require __DIR__.'/categories_list.php';