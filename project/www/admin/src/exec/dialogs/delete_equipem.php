<?php
include __DIR__ . '/../../../../src/repository/TransportRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $id = intVal($_POST['id']);
        $objRepository = new TransportRepository();
        $id_transport_equip = $objRepository->recupTranspIdEquipement($id);
        $objRepository->deleteEquipTransp($id_transport_equip);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
