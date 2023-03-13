<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/repository/EspecesRepository.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST['id'])) {
        $objetRepository = new EspecesRepository();
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
        $diploms = $objetRepository->findAllIdAndDiplomatie(intval($objetRepository->findAllAndIdUser($id)['idEspece']));
        if(!empty($diploms)) {
            foreach ($diploms as $value) {
                /*echo "---------------"."\n";
                var_dump(intval($value['id_diplomat']));
                echo "\n";
                $id_diplom = $objetRepository->recupEspecIdDiplom(intval($value['id_diplomat']));
                var_dump($id_diplom);*/
                $objetRepository->deleteDiplomEspece(intval($value['id_diplomat']));
                //echo "---------------"."\n";
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
