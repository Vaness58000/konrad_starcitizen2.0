<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classMain/TabAddList.php';
include __DIR__.'/../../../../src/repository/MatierePremiereRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if (
        !empty($_POST) &&
        array_key_exists('id', $_POST)
    ) {
        $tabAddListLieux = new TabAddList($_POST, 'lieuDataTmp');
        $tabListLieux = $tabAddListLieux->getTabList();
        // **********************
        $nameKeyImgMain = (array_key_exists('img-princ', $_POST) && !empty($_POST['img-princ'])) ? $_POST['img-princ'] : "";
        if(!empty($nameKeyImgMain)) {
            $idImgMain = intval(explode("-", $nameKeyImgMain)[1]);
        }
        $tabAddListImg = new TabAddList($_POST, 'imgFileMainTmp');
        $tabListImg = $tabAddListImg->getTabList();
        $tabAddListInfo = new TabAddList($_POST, 'infoDataTmp');
        $tabListInfo = $tabAddListInfo->getTabList();
        $visible =
            array_key_exists('contenu-visible', $_POST) &&
            !empty($_POST['contenu-visible']) &&
            strtolower($_POST['contenu-visible']) == 'on';
        for ($i = 0; $i < count($tabListImg); $i++) {
            $oneImg = new OneImg($_POST["folder-img"]);
            $nameImg = $oneImg->saveDataImg_uniqid($tabListImg[$i], 'img');
            $tabListImg[$i]['name_save'] = $nameImg;
        }
        $objRepository = new MatierePremiereRepository();
        $id_main = $objRepository->addModObj(
            $_POST["id"], 
            $_POST["nom"], 
            $_POST["contenu"], 
            $sessionUser->getId(), 
            $_POST["type-obj"], 
            $visible
        );
        // **********************
        $id_matPrem = $objRepository->add($objRepository->recupIdMatPrem($id_main), $id_main, intval($_POST['categorie']));
        if (!empty($tabListLieux) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListLieux as $value) {
                $id_lieu = intval($value['lieu']);
                $prix_vente = $value['prix-vente'];
                $prix_achat = $value['prix-achat'];
                $actu_min = $value['actu-min'];
                $inv_max = $value['inv-max'];
                if (!empty($id_lieu)) {
                    $objRepository->addModLieu(0, $id_matPrem, $id_lieu, $prix_vente, $prix_achat, $actu_min, $inv_max);
                }
            }
        }
        // **********************
        if (!empty($tabListInfo) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListInfo as $value) {
                if (!empty($value['nom']) && !empty($value['contenu'])) {
                    $objRepository->addModInfo(0, $id_main, $value['nom'], $value['contenu']);
                }
            }
        }
        if (!empty($tabListImg) && !empty($id_main) && empty($_POST['is_error'])) {
            foreach ($tabListImg as $value) {
                if (!empty($value['name_save'])) {
                    $id_img = $objRepository->addImg($id_main, $value['name_save']);
                    if($value['nameKey'] == $nameKeyImgMain) {
                        $idImgMain = $id_img;
                    }
                }
            }
        }
        if(!empty($nameKeyImgMain) && !empty($nameKeyImgMain) && empty($_POST['is_error'])) {
            $objRepository->modImgPrincip($id_main, $idImgMain);
        }
        if (empty($_POST['is_error'])) {
            echo 'true';
        } else {
            echo 'Il y a eu une erreur lors du transfert.';
        }
    } else {
        echo 'Vous ne pouvez pas faire cette action.';
    }
}
