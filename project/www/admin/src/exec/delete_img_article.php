<?php
// Démarrage de la session 
include __DIR__ . '/../../../src/repository/ArticleRepository.php';
include __DIR__.'/../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'delete_img_article';
    $file = __DIR__.'/../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);
        $oneImg = new OneImg("articles");
        $articleRepository = new ArticleRepository();
        $nameImgDelet = $articleRepository->findImgId($id);
        $oneImg->supprimer($nameImgDelet);
        $articleRepository->deleteImg($id);
        echo "true";
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}