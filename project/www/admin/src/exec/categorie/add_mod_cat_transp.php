<?php
// Démarrage de la session 
session_start();
include __DIR__.'/../../../../src/repository/categories/CatTranspRepository.php';
require __DIR__.'/../../../../src/class/classMain/OneImg.php';
require __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    die("Merci de vous connecter.");
} else {
    $oneImg = new OneImg("categories");
    $catTranspRepository = new CatTranspRepository();
    $oneImg->keyFile("file-img");
    if(!empty($_POST) && array_key_exists("id", $_POST) && array_key_exists("nom", $_POST)) {
        if($catTranspRepository->nameValid($_POST['id'], $_POST['nom'])) {
            $nameImg = "";
            if($oneImg->isGlobFile()) {
                if(!empty($_POST['id'])) {
                    $nameImgDelet = $catTranspRepository->findImgId($_POST['id']);
                    $oneImg->supprimer($nameImgDelet);
                }
                $nameImg = $oneImg->move_img_uniqid("cat");
            }
            $catTranspRepository->addMod($_POST['id'], $_POST['nom'], $_SESSION['utilisateur']['id'], $nameImg);
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

