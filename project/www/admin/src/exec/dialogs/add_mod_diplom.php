<?php
include __DIR__.'/../../../../src/repository/EspecesRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id-form-main", $_POST)) {
        $objRepository = new EspecesRepository();
        $nom_diplom = $_POST['nom'];
        $traite_diplom = $_POST['traite'];
        $id_espece = intval($objRepository->findAllAndIdUser(intval($_POST['id-form-main']))['idEspece']);
        $id_diplom = $objRepository->addModDiplom($objRepository->recupEspecIdDiplom(intval($_POST['id'])), $nom_diplom, $traite_diplom);
        $id = $objRepository->addDiplomEspec(intval($_POST['id']), $id_espece, $id_diplom);
        if(empty($_POST['is_error'])) {
            echo "true"."[#CITIZEN-ID#]".$id;
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}

