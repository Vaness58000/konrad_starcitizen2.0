<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'delete_lieux';
    $file = __DIR__.'/../../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST['id'])) {
        $objetRepository = new LieuxRepository();
        $id = intval($_POST['id']);
        $list_img = $objetRepository->findAllImgObj($id);
        if(!empty($list_img)) {
            foreach ($list_img as $value) {
                $id_img = intval($value['id_image_obj']);
                $oneImg = new OneImg($_POST['folder_img']);
                $nameImgDelet = $objetRepository->findImgId($id_img);
                $oneImg->supprimer($nameImgDelet);
                $objetRepository->deleteImg($id_img);
            }
        }
        $objetRepository->deleteObj($id);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
