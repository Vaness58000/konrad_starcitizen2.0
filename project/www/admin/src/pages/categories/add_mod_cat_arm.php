<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatArmRepository.php';

$nom_pg = "Catégorie armement FPS";

$categories = new CatArmRepository();
$categorie = $categories->findAllId($id_cat);
if(!empty($categorie)) {
    $nom_cat = $categorie['nom'];
} else {
    $id_cat = 0;
}

$tabJS = array("./src/js/categories/cat_arm.js");

require __DIR__.'/categorie.php';
