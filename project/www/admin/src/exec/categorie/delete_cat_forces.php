<?php
// Démarrage de la session 
session_start();
include __DIR__.'/../../../../src/repository/categories/CatForcesRepository.php';
require __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $catForcesRepository = new CatForcesRepository();
        $catForcesRepository->delete($_POST['id']);
        echo "true";
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}

