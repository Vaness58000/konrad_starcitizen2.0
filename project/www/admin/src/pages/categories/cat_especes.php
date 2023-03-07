<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatEspecesRepository.php';

$nom_pg = "Catégories espèces";

$categories = new CatEspecesRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdCatMain($value['id_categ_espece'], $value['nom']);
    }
}
$tabJS = array("./src/js/categories/cat_especes.js");

require __DIR__.'/categories_list.php';