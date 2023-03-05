<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatDispRepository.php';

$nom_pg = "Disponibilités";

$categories = new CatDispRepository();
$count = ceil($categories->findAllAndCount()/$nb_par_pg);
$categoriesList = $categories->findAllAndPage($page, $nb_par_pg);
if(!empty($categoriesList)) {
    foreach ($categoriesList as $value) {
        $list_cat .= "\n".addTdCatMain($value['id_disponibilite'], $value['nom_disponible']);
    }
}
$tabJS = array("./src/js/categories/cat_disp.js");

require __DIR__.'/categories_list.php';