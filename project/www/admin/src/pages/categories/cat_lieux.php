<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatLieuxRepository.php';

$nom_pg = "Catégories lieux";

$categories = new CatLieuxRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdCatMain($value['id_categ_lieu'], $value['nom']);
    }
}
$tabJS = array("./src/js/categories/cat_lieux.js");

require __DIR__.'/categories_list.php';