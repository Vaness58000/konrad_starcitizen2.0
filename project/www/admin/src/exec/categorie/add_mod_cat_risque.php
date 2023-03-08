<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/repository/categories/CatRisqueRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST) && array_key_exists("nom", $_POST)) {
        $catRisqueRepository = new CatRisqueRepository();
        if($catRisqueRepository->nameValid($_POST['id'], $_POST['nom'])) {
            $catRisqueRepository->addMod($_POST['id'], $_POST['nom'], $sessionUser->getId());
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

