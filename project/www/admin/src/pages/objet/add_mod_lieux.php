<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
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

$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$habitat = "";
$lieu_cat = "";
$risque = "";
$lier_lieu = "";
$id_cat = 0;
$id_risque = 0;
$id_lier = 0;
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_lieu = 0;
$isHabitat = true;


$objRepository = new LieuxRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_lieu = intval($_GET['id']);
        $nom = $objet['nom'];
        $contenu = $objet['contenu'];
        $id_cat = intval($objet['id_categ_lieu']);
        $id_risque = intval($objet['id_risque']);
        $id_lier = intval($objet['id_lieu_lier']);
        $isProprietaire = $objet['id_user'] == $id;
        $validation = (intval($objet['validation']) == 1);
        $isHabitat = (intval($objet['validation']) == 1);

        $imgs = $objRepository->findAllImgObj($id_lieu);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImg($value['id_image_obj'], 'lieux', $value['src'], $value['alt']);
            }
        }

        $infos = $objRepository->findAllInfObj($id_lieu);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
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

$risque_list = $objRepository->findListRisq();
if(!empty($risque_list)) {
    foreach ($risque_list as $value) {
        $risque .= "\n".addOptionCat($value['id'], $value['nom'], $id_risque);
    }
}

$lieu_cat_list = $objRepository->findListCat();
if(!empty($lieu_cat_list)) {
    foreach ($lieu_cat_list as $value) {
        $lieu_cat .= "\n".addOptionCat($value['id_categ_lieu'], $value['nom'], $id_cat);
    }
}

$lier_list = $objRepository->findAll();
if(!empty($lier_list)) {
    foreach ($lier_list as $value) {
        $lier_lieu .= "\n".addOptionCat($value['id_lieu_princ'], $value['nom_obj'], $id_lier);
    }
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";
$habitat = ($isHabitat) ? " checked" : "";

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_lieux.html');
$templatePage->addVarString("[#CITIZEN_LIEU_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_LIEU_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_LIEU_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_LIEU_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_LIEU_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_LIEU_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_LIEU_ID#]", $id_lieu);
$templatePage->addVarString("[#CITIZEN_LIEU_HABIT_CHECK#]", $habitat);
$templatePage->addVarString("[#CITIZEN_LIEU_CAT#]", $lieu_cat);
$templatePage->addVarString("[#CITIZEN_LIEU_RISQUE#]", $risque);
$templatePage->addVarString("[#CITIZEN_LIEU_LIER#]", $lier_lieu);

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
