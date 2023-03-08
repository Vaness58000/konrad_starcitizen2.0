<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/repository/ScreensRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $validation = (array_key_exists("check", $_POST) && !empty($_POST["check"]) && strtolower($_POST["check"]) == "true");
        $screensRepository = new ScreensRepository();
        $screensRepository->visible(intval($_POST["id"]), $validation);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
