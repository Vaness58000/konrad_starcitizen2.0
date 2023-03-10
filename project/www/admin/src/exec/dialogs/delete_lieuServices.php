<?php
include __DIR__.'/../../../../src/repository/ServicesRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'delete_lieuServices';
    $file = __DIR__.'/../../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    if(!empty($_POST) && array_key_exists("id-form-main", $_POST)) {
        $servicesRepository = new ServicesRepository();
        $id_serv = $objRepository->recupIdService(intVal($_POST['id-form-main']));
        $servicesRepository->deleteLieuService($id_serv);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
