<?php
require __DIR__.'/categorie_header.php';
include __DIR__.'/../../../../src/repository/categories/CatArticlesRepository.php';
require __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
require __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    die("Merci de vous connecter.");
} else {
    echo "delete_cat_articles";
}


