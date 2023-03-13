<?php
include __DIR__.'/../../../../src/repository/EspecesRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $id = intVal($_POST['id']);
    $objRepository = new EspecesRepository();
    $objRepository->deleteLieuControle($id);
    if(empty($_POST['is_error'])) {
        echo "true";
    } else {
        echo "Il y a eu une erreur lors du transfert.";
    }
}
