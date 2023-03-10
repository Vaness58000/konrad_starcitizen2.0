<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/repository/ArticleRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $id = intval($_POST['id']);
        $articleRepository = new ArticleRepository();
        $list_img = $articleRepository->findImgArticleId($id);
        /*var_dump(intval($_POST['id']));
        var_dump($list_img);*/
        if(!empty($list_img)) {
            foreach ($list_img as $value) {
                $idImg = intval($value['id']);
                $nameImgDelet = $articleRepository->findImgId($idImg);
                $oneImg = new OneImg("articles");
                $oneImg->supprimer($nameImgDelet);
                $articleRepository->deleteImg($idImg);
            }
        }
        $articleRepository->delete($id);
        if(empty($_POST['is_error'])) {
            echo "true";
        } else {
            echo "Il y a eu une erreur lors du transfert.";
        }
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
