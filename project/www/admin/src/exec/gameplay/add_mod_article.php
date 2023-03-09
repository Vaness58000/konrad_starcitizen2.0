<?php
// Démarrage de la session
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__ . '/../../../../src/class/classMain/TabAddList.php';
include __DIR__ . '/../../../../src/class/classSite/SessionUser.php';
include __DIR__ . '/../../../../src/repository/ArticleRepository.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if (!$sessionUser->isConnected()) {
    die('Merci de vous connecter.');
} else {
    if (
        !empty($_POST) &&
        array_key_exists('id', $_POST)
    ) {
        $tabAddListImg = new TabAddList($_POST, 'imgFileMainTmp');
        $tabListImg = $tabAddListImg->getTabList();
        $tabAddListGplay = new TabAddList($_POST, 'gplayTypeDataTmp');
        $tabListGplay = $tabAddListGplay->getTabList();
        $visible =
            array_key_exists('contenu-visible', $_POST) &&
            !empty($_POST['contenu-visible']) &&
            strtolower($_POST['contenu-visible']) == 'on';
        for ($i = 0; $i < count($tabListImg); $i++) {
            $oneImg = new OneImg('articles');
            $nameImg = $oneImg->saveDataImg_uniqid($tabListImg[$i], 'img');
            $tabListImg[$i]['name_save'] = $nameImg;
        }
        $articleRepository = new ArticleRepository();
        $id_main = $articleRepository->addMod(
            $_POST["id"], 
            $sessionUser->getId(), 
            $_POST["titre"], 
            $_POST["contenu"], 
            intval($_POST["categorie"]), 
            $_POST["resume"], 
            $_POST["video"], 
            $visible
        );
        if (!empty($tabListGplay) && !empty($id_main) && empty($_POST['id'])) {
            foreach ($tabListGplay as $value) {
                $id_gplay = intval($value['gplay']);
                if (!empty($id_gplay)) {
                    $articleRepository->addModGPlay(0, $id_main, $id_gplay);
                }
            }
        }
        if (!empty($tabListImg) && !empty($id_main)) {
            foreach ($tabListImg as $value) {
                if (!empty($value['name_save'])) {
                    $articleRepository->addImg($id_main, $value['name_save']);
                }
            }
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
