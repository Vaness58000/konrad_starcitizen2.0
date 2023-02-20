<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ArticleRepository.php';
require __DIR__.'/../../../../back/connexion.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('user', $_SESSION) && !empty($_SESSION['user']))) {
    header('Location: ../?ind=login');
    die();
}

// On récupere les données de l'utilisateur
$req = $dbco->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch(PDO::FETCH_ASSOC);

$pseudo = $data['pseudo'];
$id = $data["id_client"];

$titre = "";
$video = "";
$categorie = "";
$contenu = "";
$resume = "";

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    $articleRepository = new ArticleRepository();
    $article = $articleRepository->findAllAndUserId(intval($_GET['id']));
    if(count($article)>0){
        $titre = $article['titre'];
        $video = $article['video'];
        $categorie = "";
        $contenu = $article['contenu'];
        $resume = $article['resume'];
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/add_mod_article.html');
$templatePage->addVarString("[#CITIZEN_USER_ID#]", $id);
$templatePage->addVarString("[#CITIZEN_USER_PSEUDO#]", $pseudo);
$templatePage->addVarString("[#CITIZEN_ARTI_TITRE#]", $titre);
$templatePage->addVarString("[#CITIZEN_ARTI_VIDEO#]", $video);
$templatePage->addVarString("[#CITIZEN_ARTI_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_ARTI_RESUME#]", $resume);

$templatePage->addFileJs("../src/js/modale.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
