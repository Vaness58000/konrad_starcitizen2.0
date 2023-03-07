<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatArmRepository.php';

$nom_pg = "Catégories armement FPS";

$categories = new CatArmRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdCatMain($value['id_categ_arme'], $value['nom']);
    }
}
$tabJS = array("./src/js/categories/cat_arm.js");

require __DIR__.'/categories_list.php';
