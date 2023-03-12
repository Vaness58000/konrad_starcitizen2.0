<?php
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/repository/MatierePremiereRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'delete_lieuMatPre';
    $file = __DIR__.'/../../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $id = intVal($_POST['id']);
        $objRepository = new MatierePremiereRepository();
        $objRepository->deleteLieuMatPrem($id);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
