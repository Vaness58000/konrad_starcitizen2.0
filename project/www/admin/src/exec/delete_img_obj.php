<?php
// Démarrage de la session 
include __DIR__.'/../../../src/repository/ObjetRepository.php';
include __DIR__.'/../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {die("Merci de vous connecter.");
} else {
    $name = 'delete_img_obj';
    $file = __DIR__.'/../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);
        $oneImg = new OneImg($_POST['folder_img']);
        $objetRepository = new ObjetRepository();
        $nameImgDelet = $objetRepository->findImgId($id);
        $oneImg->supprimer($nameImgDelet);
        $objetRepository->deleteImg($id);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}