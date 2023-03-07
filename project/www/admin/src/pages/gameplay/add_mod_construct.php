<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
include __DIR__.'/../../function/table-admin.php';
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

$id_construct = 0;
$logo = "./src/images/plus-square.svg";
$img = "./src/images/plus-square.svg";
$contenu = "";
$nom = "";
$tab_lieu = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";


$constructeurRepository = new ConstructeurRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $constructeur = $constructeurRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($constructeur)>0){
        $id_construct = intval($_GET['id']);
        $isProprietaire = $constructeur['id_user'] == $id;
        if(!empty($constructeur['logo'])) {
            $logo = './../upload/constructeurs_logo/'.$constructeur['logo'];
        }
        if(!empty($constructeur['image'])) {
            $img = './../upload/constructeurs/'.$constructeur['image'];
        }

        $contenu = $constructeur['contenu'];
        $nom = $constructeur['nom'];
        //$lieu = $screen['image'];
        $validation = (intval($constructeur['validation']) == 1);

        $lieux = $constructeurRepository->findAllIdAndLieux(intval($_GET['id']));
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_const_lieu'], $value['nom_lieu'], 'lieu', $value['id_lieu']);
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

/*$category = $articleRepository->findAllCat();
if(!empty($category)) {
    foreach ($category as $value) {
        $categorieList .= "\n".addOptionCat($value['id_categorie_article'], $value['nom'], $categorie);
    }
}*/

$templatePage = new TemplatePage(__DIR__.'/../../template/gameplay/add_mod_construct.html');
$templatePage->addVarString("[#CITIZEN_CONST_ISPRO#]", $isProprietaire);
$templatePage->addVarString("[#CITIZEN_CONST_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_CONST_ID#]", $id_construct);
$templatePage->addVarString("[#CITIZEN_CONST_LOGO#]", $logo);
$templatePage->addVarString("[#CITIZEN_CONST_IMG#]", $img);
$templatePage->addVarString("[#CITIZEN_CONST_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_CONST_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_CONST_TAB_LIEU#]", $tab_lieu);

$templatePage->addFileCss("./src/css/style_dialog.css");

$templatePage->addFileJs("./src/js/gameplay/construct.js");
$templatePage->addFileJs("./src/js/img/all_img_user.js");
$templatePage->addFileJs("./src/js/dialog/dialog_main.js");
/*$templatePage->addFileJs("./src/js/tab_add.js");*/

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
