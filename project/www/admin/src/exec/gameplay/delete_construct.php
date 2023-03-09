<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $oneImg = new OneImg("constructeurs");
        $oneImgLogo = new OneImg("constructeurs_logo");
        $constructeurRepository = new ConstructeurRepository();
        $oneImg->keyFile("file-img");
        $oneImgLogo->keyFile("file-logo");
        if(!empty($_POST['id'])) {
            $nameImgDelet = $constructeurRepository->findImgId($_POST['id']);
            $oneImg->supprimer($nameImgDelet);
            $nameImgLogoDelet = $constructeurRepository->findImgLogoId($_POST['id']);
            $oneImgLogo->supprimer($nameImgLogoDelet);
        }
        $constructeurRepository->delete($_POST['id']);
        echo "true";
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
