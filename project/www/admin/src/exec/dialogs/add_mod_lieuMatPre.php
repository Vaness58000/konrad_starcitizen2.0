<?php
include __DIR__.'/../../../../src/repository/MatierePremiereRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id-form-main", $_POST)) {
        $objRepository = new MatierePremiereRepository();
        $id_matPrem = $objRepository->recupIdMatPrem(intVal($_POST['id-form-main']));
        $id_lieu = intval($_POST['lieu']);
        $prix_vente = $_POST['prix-vente'];
        $prix_achat = $_POST['prix-achat'];
        $actu_min = $_POST['actu-min'];
        $inv_max = $_POST['inv-max'];
        $id = $objRepository->addModLieu(intVal($_POST['id']), $id_matPrem, $id_lieu, $prix_vente, $prix_achat, $actu_min, $inv_max);
        if(empty($_POST['is_error'])) {
            echo "true"."[#CITIZEN-ID#]".$id;
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
