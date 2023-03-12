<?php
include __DIR__.'/../../../../src/repository/ProprietairesRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id-form-main", $_POST)) {
        $objRepository = new ProprietairesRepository();
        $id_pro = $objRepository->recupIdPropriet(intVal($_POST['id-form-main']));
        $id = $objRepository->addModLieu(intVal($_POST['id']), $id_pro, intVal($_POST['lieu']));
        if(empty($_POST['is_error'])) {
            echo "true"."[#CITIZEN-ID#]".$id;
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
