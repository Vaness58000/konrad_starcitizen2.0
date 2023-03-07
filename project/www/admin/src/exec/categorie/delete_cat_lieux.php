<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/repository/categories/CatLieuxRepository.php';
require __DIR__.'/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $oneImg = new OneImg("categories");
        $catLieuxRepository = new CatLieuxRepository();
        $oneImg->keyFile("file-img");
        if(!empty($_POST['id'])) {
            $nameImgDelet = $catLieuxRepository->findImgId($_POST['id']);
            $oneImg->supprimer($nameImgDelet);
        }
        $catLieuxRepository->delete($_POST['id']);
        echo "true";
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}

