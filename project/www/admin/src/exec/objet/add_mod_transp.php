<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classMain/TabAddList.php';
include __DIR__.'/../../../../src/repository/TransportRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    /*$name = 'add_mod_transp';
    $file = __DIR__.'/../../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);*/
    if (
        !empty($_POST) &&
        array_key_exists('id', $_POST)
    ) {
        /*
        ?string $prix, ?string $equipage, ?string $taille, ?string $poids, 
        ?string $vitesse_max, ?string $capacite, ?string $description, 
        int $categorie, int $type, ?string $lien, int $id_disponible
        */
        $nom = $_POST["nom"];
        $prix = $_POST["prix"];
        $equipage = $_POST["equipage"];
        $taille = $_POST["taille"];
        $poids = $_POST["poids"];
        $vitesse_max = $_POST["vitesse-max"];
        $capacite = $_POST["capacite"];
        $contenu = $_POST["contenu"];
        $lien = $_POST["lien"];
        $categorie = intval($_POST["categorie"]);
        $type = intval($_POST["type"]);
        $id_disponible = intval($_POST["disponible"]);
        $id_construct = intval($_POST["construct"]);
        $tabAddListLieux = new TabAddList($_POST, 'lieuDataTmp');
        $tabListLieux = $tabAddListLieux->getTabList();
        $tabAddListForce = new TabAddList($_POST, 'forceDataTmp');
        $tabListForce = $tabAddListForce->getTabList();
        $tabAddListFaibl = new TabAddList($_POST, 'faiblDataTmp');
        $tabListFaibl = $tabAddListFaibl->getTabList();
        $tabAddListArm = new TabAddList($_POST, 'armDataTmp');
        $tabListArm = $tabAddListArm->getTabList();
        $tabAddListEquip = new TabAddList($_POST, 'equipDataTmp');
        $tabListEquip = $tabAddListEquip->getTabList();
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
        $objRepository = new TransportRepository();
        $id_main = $objRepository->addModObj(
            $_POST["id"], 
            $nom, 
            $contenu, 
            $sessionUser->getId(), 
            $_POST["type-obj"], 
            $visible
        );
        // **********************
        $id_transp = $objRepository->add($objRepository->recupIdTransp($id_main), $id_main, $prix, $equipage, $taille, $poids, $vitesse_max, $capacite, $categorie, $type, $lien, $id_disponible);
        $objRepository->addModConstruct($objRepository->recupIdConstructTransp(intval($_POST['id'])), $id_transp, $id_construct);
        if (!empty($tabListLieux) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListLieux as $value) {
                $id_lieu = intval($value['lieu']);
                if (!empty($id_lieu)) {
                    $objRepository->addModLieu(0, $id_transp, $id_lieu);
                }
            }
        }
        if (!empty($tabListForce) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListForce as $value) {
                $id_force = intval($value['force']);
                if (!empty($id_force)) {
                    $objRepository->addModForce(0, $id_transp, $id_force);
                }
            }
        }
        if (!empty($tabListFaibl) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListFaibl as $value) {
                $id_faibl = intval($value['faibl']);
                if (!empty($id_faibl)) {
                    $objRepository->addModFaibl(0, $id_transp, $id_faibl);
                }
            }
        }
        if (!empty($tabListArm) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListArm as $value) {
                $id_arm = intval($value['arm']);
                if (!empty($id_arm)) {
                    $objRepository->addModArm(0, $id_transp, $id_arm);
                }
            }
        }
        if (!empty($tabListEquip) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListEquip as $value) {
                $nom_equip = $value['nom'];
                $contenu_equip = $value['contenu'];
                $prix_equip = $value['prix'];
                if (!empty($nom_equip) && !empty($nom_equip)) {
                    $id_equip = $objRepository->addModEquip(0, $nom_equip, $contenu_equip, $prix_equip);
                    $objRepository->addEquipTransp(0, $id_equip, $id_transp);
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
