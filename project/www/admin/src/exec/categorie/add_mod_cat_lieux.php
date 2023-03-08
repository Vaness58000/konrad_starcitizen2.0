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
    $oneImg = new OneImg("categories");
    $catLieuxRepository = new CatLieuxRepository();
    $oneImg->keyFile("file-img");
    if(!empty($_POST) && array_key_exists("id", $_POST) && array_key_exists("nom", $_POST)) {
        if($catLieuxRepository->nameValid($_POST['id'], $_POST['nom'])) {
            $nameImg = "";
            if($oneImg->isGlobFile()) {
                if(!empty($_POST['id'])) {
                    $nameImgDelet = $catLieuxRepository->findImgId($_POST['id']);
                    $oneImg->supprimer($nameImgDelet);
                }
                $nameImg = $oneImg->move_img_uniqid("cat");
            }
            $catLieuxRepository->addMod($_POST['id'], $_POST['nom'], $sessionUser->getId(), $nameImg);
            if(empty($_POST['is_error'])) {
                echo "true";
            } else {
                echo "Il y a eu une erreur lors du transfert.";
            }
        } else {
            echo "Ce nom n'est pas disponible.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}

