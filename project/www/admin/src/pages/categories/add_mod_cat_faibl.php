<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatFaiblRepository.php';

$nom_pg = "Faiblesse";

$categories = new CatFaiblRepository();
$categorie = $categories->findAllId($id_cat);
if(!empty($categorie)) {
    $nom_cat = $categorie['nom_faiblesse'];
} else {
    $id_cat = 0;
}

$tabJS = array("./src/js/categories/cat_faibl.js");

require __DIR__.'/categorie.php';