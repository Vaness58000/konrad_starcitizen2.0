<?php
include __DIR__ . '/../../../../src/repository/TransportRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id-form-main", $_POST)) {
        $objRepository = new TransportRepository();
        $nom_equip = $_POST['nom'];
        $contenu_equip = $_POST['contenu'];
        $prix_equip = $_POST['prix'];
        $id_transp = intval($objRepository->findAllAndIdUser(intval($_POST['id-form-main']))['id_transp']);
        $id = $id_equip = $objRepository->addModEquip($objRepository->recupTranspIdEquipement(intval($_POST['id'])), $nom_equip, $contenu_equip, $prix_equip);
        $objRepository->addEquipTransp(intval($_POST['id']), $id_equip, $id_transp);
        if(empty($_POST['is_error'])) {
            echo "true"."[#CITIZEN-ID#]".$id;
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
