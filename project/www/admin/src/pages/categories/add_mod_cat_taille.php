<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatTailleRepository.php';

$nom_pg = "Tailles";

$categories = new CatTailleRepository();
$categorie = $categories->findAllId($id_cat);
if(!empty($categorie)) {
    $nom_cat = $categorie['taille'];
} else {
    $id_cat = 0;
}

$tabJS = array("./src/js/categories/cat_taille.js");

require __DIR__.'/categorie.php';