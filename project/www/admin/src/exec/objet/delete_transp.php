<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/repository/TransportRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST['id'])) {
        $objetRepository = new TransportRepository();
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
        $equipems = $objetRepository->findAllIdAndEquipem(intval($objetRepository->findAllAndIdUser($id)['id_transp']));
        if(!empty($equipems)) {
            foreach ($equipems as $value) {
                $id_transport_equip = $objetRepository->recupTranspIdEquipement(intval($value['id_transp_equip']));
                $objetRepository->deleteEquipTransp($id_transport_equip);
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
