<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
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
                $tab_lieu .= "\n".addTdTabSupl($value['id_const_lieu'], $value['nom_lieu'], 'lieu');
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

$templatePage->addFileJs("./src/js/construct.js");
$templatePage->addFileJs("./src/js/all_img_user.js");
$templatePage->addFileJs("./src/js/ad_mod.js");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
