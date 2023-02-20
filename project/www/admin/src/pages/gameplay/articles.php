<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ArticleRepository.php';
require __DIR__.'/../../../../back/connexion.php'; // ajout connexion bdd 
include __DIR__.'/../../function/table-admin.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('user', $_SESSION) && !empty($_SESSION['user']))) {
    header('Location: ../?ind=login');
    die();
}

$page = 0;
if (!empty($_GET) && array_key_exists('page', $_GET) && !empty($_GET['page'])) {
    $page = intval($_GET['page']-1);
}

// On récupere les données de l'utilisateur
$req = $dbco->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch(PDO::FETCH_ASSOC);

$pseudo = $data['pseudo'];
$id = $data["id_client"];


$articleRepository = new ArticleRepository();
$count = $articleRepository->findAllAndTypeUserIdCount(intval($id), intval($_GET['type']));
$articles = $articleRepository->findAllAndTypeUserIdPage(intval($id), intval($_GET['type']), $page, 10);
$tab_all = "";
if(!empty($articles)) {
    foreach ($articles as $value) {
        $tab_all .= "\n".addTdMain($value['id_article'], $value['titre'], intval($value['validation'])==1, false);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/articles.html');
$templatePage->addVarString("[#CITIZEN_TAB_ALL#]", $tab_all);

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/tab_display_all.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
