<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/repository/ScreensRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
require __DIR__.'/../../../../src/class/classMain/OneImg.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST) && array_key_exists("nom", $_POST)) {
        $visible = (array_key_exists("nom", $_POST) && !empty($_POST['contenu-visible']) && strtolower($_POST['contenu-visible']) == "on");
        $oneImg = new OneImg("screen");
        $screensRepository = new ScreensRepository();
        $oneImg->keyFile("file-img");
        $nameImg = "";
        if($oneImg->isGlobFile()) {
            if(!empty($_POST['id'])) {
                $nameImgDelet = $screensRepository->findImgId($_POST['id']);
                $oneImg->supprimer($nameImgDelet);
            }
            $nameImg = $oneImg->move_img_uniqid("cat");
        }
        $screensRepository->addMod($_POST['id'], $_POST['nom'], $_POST['alt'], $sessionUser->getId(), $visible, $nameImg);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
