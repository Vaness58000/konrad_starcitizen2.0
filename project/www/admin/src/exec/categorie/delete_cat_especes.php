<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/repository/categories/CatEspecesRepository.php';
require __DIR__.'/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $oneImg = new OneImg("categories");
        $catEspecesRepository = new CatEspecesRepository();
        $oneImg->keyFile("file-img");
        if(!empty($_POST['id'])) {
            $nameImgDelet = $catEspecesRepository->findImgId($_POST['id']);
            $oneImg->supprimer($nameImgDelet);
        }
        $catEspecesRepository->delete($_POST['id']);
        echo "true";
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}

