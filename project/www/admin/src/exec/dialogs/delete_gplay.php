<?php
include __DIR__.'/../../../../src/repository/ArticleRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    if(!empty($_POST) && array_key_exists("id", $_POST)) {
        $articleRepository = new ArticleRepository();
        $articleRepository->deleteGPlay(intval($_POST['id']));
        echo "true";
    } else {
        echo "Vous ne pouvez pas faire cette action.";
    }
}
