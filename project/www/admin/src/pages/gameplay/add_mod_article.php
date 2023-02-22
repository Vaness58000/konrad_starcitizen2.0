<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ArticleRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    header('Location: ../?ind=login');
    die();
}

$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($_SESSION['utilisateur']['id']);

$pseudo = $user['pseudo'];
$id = intval($user["idUser"]);
$id_role = intval($user["id_role"]);
$isAdmin = $id_role == 2;

$titre = "";
$video = "";
$categorie = 0;
$categorieList = "";
$contenu = "";
$resume = "";
$all_img = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_article = 0;


$articleRepository = new ArticleRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $article = $articleRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($article)>0){
        $id_article = intval($_GET['id']);
        $isProprietaire = $article['id_user'] == $id;
        $titre = $article['titre'];
        $video = $article['video'];
        $categorie = intval($article['id_categorie_article']);
        $contenu = $article['contenu'];
        $resume = $article['resume'];
        $validation = (intval($article['validation']) == 1);
    }

    $imgs = $articleRepository->findAllImgArticle(intval($_GET['id']));
    if(!empty($imgs)) {
        foreach ($imgs as $value) {
            $all_img .= "\n".addImg($value['id'], 'articles', $value['src'], $value['alt']);
        }
    }
} else {
    $isProprietaire = true;
}

if (!($isProprietaire || $isAdmin)) {
    header('Location: ./?ind=articles');
    die();
}

if ($isProprietaire) {
    $isModif = "";
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";

$category = $articleRepository->findAllCat();
if(!empty($category)) {
    foreach ($category as $value) {
        $categorieList .= "\n".addOptionCat($value['id_categorie_article'], $value['nom'], $categorie);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/gameplay/add_mod_article.html');
$templatePage->addVarString("[#CITIZEN_ARTI_TITRE#]", $titre);
$templatePage->addVarString("[#CITIZEN_ARTI_VIDEO#]", $video);
$templatePage->addVarString("[#CITIZEN_ARTI_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_ARTI_RESUME#]", $resume);
$templatePage->addVarString("[#CITIZEN_ARTI_CAT#]", $categorieList);
$templatePage->addVarString("[#CITIZEN_ARTI_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_ARTI_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_ARTI_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_ARTI_ID#]", $id_article);

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
