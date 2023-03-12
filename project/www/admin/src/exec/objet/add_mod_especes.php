<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/class/classMain/TabAddList.php';
include __DIR__.'/../../../../src/repository/EspecesRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'add_mod_especes';
    $file = __DIR__.'/../../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    if (
        !empty($_POST) &&
        array_key_exists('id', $_POST)
    ) {
        $tabAddListContro = new TabAddList($_POST, 'controDataTmp');
        $tabListContro = $tabAddListContro->getTabList();
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
        $objRepository = new EspecesRepository();
        $id_main = $objRepository->addModObj(
            $_POST["id"], 
            $_POST["nom"], 
            $_POST["contenu"], 
            $sessionUser->getId(), 
            $_POST["type-obj"], 
            $visible
        );
        // **********************
        $id_lieu_esp = intval($_POST['lieu']);
        $id_categ_espece = intval($_POST['categorie']);
        $gouvernence = $_POST['gouvernence'];
        $souverainete = $_POST['souverainete'];
        $philosophie = $_POST['philosophie'];
        $religion = $_POST['religion'];
        $pre_contact = $_POST['premier_cont'];
        $origine = $_POST['origine'];
        $id_espece = $objRepository->add($objRepository->recupIdEspece($id_main), $id_main, $id_categ_espece, $gouvernence, $souverainete, $philosophie, $religion, $pre_contact, $origine);
        if (!empty($tabListContro) && !empty($id_main) && empty($_POST['id']) && empty($_POST['is_error'])) {
            foreach ($tabListContro as $value) {
                $id_lieu = intval($value['lieu']);
                if (!empty($id_lieu)) {
                    $objRepository->addModControle(0, $id_espece, $id_lieu);
                }
            }
        }
        $objRepository->addModLieu($objRepository->recupIdLieuEspece($id_espece), $id_espece, $id_lieu_esp);
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
