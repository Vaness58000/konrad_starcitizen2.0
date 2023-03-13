<?php
include __DIR__.'/../../../../src/repository/ArmeRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id-form-main", $_POST)) {
        $objRepository = new ArmeRepository();
        $id_arm = $objRepository->recupIdArm(intVal($_POST['id-form-main']));
        $id_lieu = intval($_POST['lieu']);
        $id_couleur = intval($_POST['couleur']);
        $prix = $_POST['prix'];
        $id = $objRepository->addModLieu(intVal($_POST['id']), $id_arm, $id_lieu, $prix);
        $objRepository->addModArmCouleur($objRepository->recupIdArmCouleur($id), $id, $id_couleur);
        if(empty($_POST['is_error'])) {
            echo "true"."[#CITIZEN-ID#]".$id;
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
