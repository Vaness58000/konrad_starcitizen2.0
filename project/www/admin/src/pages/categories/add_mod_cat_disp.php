<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatDispRepository.php';

$nom_pg = "Disponibilit√©";

$categories = new CatDispRepository();
$categorie = $categories->findAllId($id_cat);
if(!empty($categorie)) {
    $nom_cat = $categorie['nom_disponible'];
} else {
    $id_cat = 0;
}

$tabJS = array("./src/js/categories/cat_disp.js");

require __DIR__.'/categorie.php';