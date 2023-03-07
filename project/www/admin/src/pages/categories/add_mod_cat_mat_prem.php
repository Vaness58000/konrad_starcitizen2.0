<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatMatPremRepository.php';

$nom_pg = "Catégorie matière première";

$categories = new CatMatPremRepository();
$categorie = $categories->findAllId($id_cat);
if(!empty($categorie)) {
    $nom_cat = $categorie['nom'];
} else {
    $id_cat = 0;
}

$tabJS = array("./src/js/categories/cat_mat_prem.js");

require __DIR__.'/categorie.php';