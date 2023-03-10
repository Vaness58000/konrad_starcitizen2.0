<?php
include __DIR__ . '/../../../../src/repository/ObjetRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id-form-main", $_POST)) {
        $objetRepository = new ObjetRepository();
        $id = $objetRepository->addModInfo(intVal($_POST['id']), intVal($_POST['id-form-main']), $_POST['nom'], $_POST['contenu']);
        if(empty($_POST['is_error'])) {
            echo "true"."[#CITIZEN-ID#]".$id;
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
