<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ArticleRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/categories/CatArticlesRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ../?ind=login');
    die();
}

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();

$titre = "";
$video = "";
$categorie = 0;
$categorieList = "";
$contenu = "";
$resume = "";
$all_img = "";
$gplay_type = "";
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

        $imgs = $articleRepository->findAllImgArticle(intval($_GET['id']));
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImg($value['id'], 'articles', $value['src'], $value['alt']);
            }
        }

        $gplayTypes = $articleRepository->findAllIdAndGplayType(intval($_GET['id']));
        if(!empty($gplayTypes)) {
            foreach ($gplayTypes as $value) {
                $gplay_type .= "\n".addTdTabSupl($value['id_gameplay_type_articles'], $value['nom'], 'gplayType');
            }
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

$catArticlesRepository = new CatArticlesRepository();
$category = $catArticlesRepository->findAllOrder(true);
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
$templatePage->addVarString("[#CITIZEN_ARTI_TAB_GPLAY_TYPE#]", $gplay_type);


$templatePage->addFileCss("./src/css/style_dialog.css");

$templatePage->addFileJs("./src/js/gameplay/articles.js");
$templatePage->addFileJs("./src/js/img/all_img_user.js");
$templatePage->addFileJs("./src/js/dialog/dialog_main.js");
/*$templatePage->addFileJs("./src/js/tab_add.js");*/
/*$templatePage->addFileJs("./src/js/tab_form.js");*/

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
