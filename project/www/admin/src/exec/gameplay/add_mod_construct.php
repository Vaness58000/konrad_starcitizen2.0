<?php
// Démarrage de la session 
include __DIR__.'/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classMain/TabAddList.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST) && array_key_exists("nom", $_POST)) {
        $tabAddList = new TabAddList($_POST, "lieuDataTmp");
        $tabList = $tabAddList->getTabList();
        $visible = (array_key_exists("contenu-visible", $_POST) && !empty($_POST['contenu-visible']) && strtolower($_POST['contenu-visible']) == "on");
        $oneImg = new OneImg("constructeurs");
        $oneImgLogo = new OneImg("constructeurs_logo");
        $constructeurRepository = new ConstructeurRepository();
        $oneImg->keyFile("file-img");
        $oneImgLogo->keyFile("file-logo");
        if($constructeurRepository->nameValid($_POST['id'], $_POST['nom'])) {
            $nameImgLogo = "";
            $nameImg = "";
            if($oneImg->isGlobFile()) {
                if(!empty($_POST['id'])) {
                    $nameImgDelet = $constructeurRepository->findImgId($_POST['id']);
                    $oneImg->supprimer($nameImgDelet);
                }
                $nameImg = $oneImg->move_img_uniqid("img");
            }
            if($oneImgLogo->isGlobFile()) {
                if(!empty($_POST['id'])) {
                    $nameImgLogoDelet = $constructeurRepository->findImgLogoId($_POST['id']);
                    $oneImgLogo->supprimer($nameImgLogoDelet);
                }
                $nameImgLogo = $oneImgLogo->move_img_uniqid("logo");
            }
            $id_main = $constructeurRepository->addMod($_POST['id'], $_POST['nom'], $_POST['contenu'], $sessionUser->getId(), $visible, $nameImgLogo, $nameImg);
            if(!empty($tabList) && !empty($id_main) && empty($_POST['id'])) {
                foreach ($tabList as $value) {
                    $id_lieu = intval($value['lieu']);
                    if(!empty($id_lieu)) {
                        $constructeurRepository->addModLieu(0, $id_main, $id_lieu);
                    }
                }
            }
            if(empty($_POST['is_error'])) {
                echo "true";
            } else {
                echo "Il y a eu une erreur lors du transfert.";
            }
        } else {
            echo "Ce nom n'est pas disponible.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
