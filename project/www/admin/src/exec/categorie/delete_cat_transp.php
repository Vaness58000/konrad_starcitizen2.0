<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/repository/categories/CatTranspRepository.php';
require __DIR__.'/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $oneImg = new OneImg("categories");
        $catTranspRepository = new CatTranspRepository();
        if(!empty($_POST['id'])) {
            $nameImgDelet = $catTranspRepository->findImgId($_POST['id']);
            $oneImg->supprimer($nameImgDelet);
        }
        $catTranspRepository->delete($_POST['id']);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}

