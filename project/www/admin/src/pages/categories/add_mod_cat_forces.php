<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatForcesRepository.php';

$nom_pg = "Force";

$categories = new CatForcesRepository();
$categorie = $categories->findAllId($id_cat);
if(!empty($categorie)) {
    $nom_cat = $categorie['nom_force'];
} else {
    $id_cat = 0;
}

$tabJS = array("./src/js/categories/cat_forces.js");

require __DIR__.'/categorie.php';