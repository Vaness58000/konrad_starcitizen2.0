<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatEspecesRepository.php';

$nom_pg = "Catégorie espèce";

$categories = new CatEspecesRepository();
$categorie = $categories->findAllId($id_cat);
if(!empty($categorie)) {
    $nom_cat = $categorie['nom'];
    if(!empty($categorie['img_cat'])) {
        $img = "./../upload/".'categories'."/".$categorie['img_cat'];
    }
} else {
    $id_cat = 0;
}

$tabJS = array("./src/js/categories/cat_arm.js");

require __DIR__.'/categorieAndImg.php';