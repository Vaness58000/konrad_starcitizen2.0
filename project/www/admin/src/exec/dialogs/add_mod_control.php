<?php
include __DIR__.'/../../../../src/repository/EspecesRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $objRepository = new EspecesRepository();
    //$id_espec = $objRepository->recupIdEspece(intVal($_POST['id-form-main']));
    $id_espec = $objRepository->recupObjEspecIdDiplom(intVal($_POST['id-form-main']));
    $id = $objRepository->addModControle(intVal($_POST['id']), $id_espec, intVal($_POST['lieu']));
    if(empty($_POST['is_error'])) {
        echo "true"."[#CITIZEN-ID#]".$id;
    } else {
        echo "Il y a eu une erreur lors du transfert.";
    }
}
