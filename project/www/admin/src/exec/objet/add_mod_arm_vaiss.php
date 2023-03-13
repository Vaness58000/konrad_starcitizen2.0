<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classMain/TabAddList.php';
include __DIR__.'/../../../../src/repository/ArmeVaissRepository.php';
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
        $objRepository = new ArmeVaissRepository();
        $id_main = $objRepository->addModObj(
            $_POST["id"], 
            $_POST["nom"], 
            $_POST["contenu"], 
            $sessionUser->getId(), 
            $_POST["type-obj"], 
            $visible
        );
        $id_type_arm = intval($_POST['type-arm']);
        $id_construct = intval($_POST['constructeur']);
        $lien = $_POST['lien'];
        $id_arm = $objRepository->addArm($objRepository->recupIdArm($id_main), $id_main, $id_type_arm, $lien);
        $objRepository->addModConstruct($objRepository->recupIdConstructArm(intval($_POST['id'])), $id_arm, $id_construct);
        // **********************
        $id_taille = intval($_POST['taille']);
        $objRepository->add($objRepository->recupIdArmTransp($id_arm), $id_arm, $id_taille);
        // **********************
        if (!empty($tabListLieux) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListLieux as $value) {
                $id_lieu = intval($value['lieu']);
                if (!empty($id_lieu)) {
                    $id_couleur = intval($value['couleur']);
                    $prix = $value['prix'];
                    $id_lieu_arm = $objRepository->addModLieu(0, $id_arm, $id_lieu, $prix);
                    $objRepository->addModArmCouleur($objRepository->recupIdArmCouleur($id_lieu_arm), $id_lieu_arm, $id_couleur);
                }
            }
        }
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
