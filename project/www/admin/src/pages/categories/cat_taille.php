<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatTailleRepository.php';

$nom_pg = "Tailles";

$categories = new CatTailleRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdMain($value['id'], $value['taille'], true, $isAdmin);
    }
}
$tabJS = array("./src/js/categories/cat_taille.js");

require __DIR__.'/categories_list.php';