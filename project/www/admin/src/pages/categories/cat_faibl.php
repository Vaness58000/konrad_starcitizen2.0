<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatFaiblRepository.php';

$nom_pg = "Faiblesses";

$categories = new CatFaiblRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdMain($value['id_faiblesse'], $value['nom_faiblesse'], true, $isAdmin);
    }
}
$tabJS = array("./src/js/categories/cat_faibl.js");

require __DIR__.'/categories_list.php';