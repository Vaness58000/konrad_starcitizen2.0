<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ProprietairesRepository.php';
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

$logo = "./src/images/plus-square.svg";
$categ = "";
$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_obj = 0;


$objetRepository = new ProprietairesRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objetRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_obj = intval($_GET['id']);
        $nom = $objet['nom'];
        $contenu = $objet['contenu'];
        $isProprietaire = $objet['id_user'] == $id;
        $validation = (intval($objet['validation']) == 1);

        if(!empty($objet['logo'])) {
            $logo = "./../upload/".'proprietaires_logo'."/".$objet['logo'];
        }

        $id_img_main = 0;
        $img_main = $objetRepository->imagePrincipale(intval($_GET['id']));
        if(!empty($img_main)) {
            $id_img_main = $img_main["id_image_obj"];
        }

        $imgs = $objetRepository->findAllImgObj($id_obj);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImgAndPrinc($value['id_image_obj'], 'proprietaires', $value['src'], $value['alt'], $id_img_main);
            }
        }

        $infos = $objetRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $lieux = $objetRepository->findAllIdAndLieux(intval($objet['id_proprietaire']));
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_proprietaire_lieu'], $value['nom_lieu'], 'lieu', $value['id_lieu']);
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

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_proprietaires.html');
$templatePage->addVarString("[#CITIZEN_PROPR_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_PROPR_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_PROPR_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_PROPR_TAB_LIEU#]", $tab_lieu);
$templatePage->addVarString("[#CITIZEN_PROPR_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_PROPR_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_PROPR_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_PROPR_ID#]", $id_obj);
$templatePage->addVarString("[#CITIZEN_PROPR_LOGO#]", $logo);
$templatePage->addVarString("[#CITIZEN_PROPR_CAT#]", $categ);

$templatePage->addFileCss("./src/css/style_dialog.css");

$templatePage->addFileJs("./src/js/proprietaires.js");
$templatePage->addFileJs("./src/js/all_img_user.js");
$templatePage->addFileJs("./src/js/ad_mod.js");
$templatePage->addFileJs("./src/js/dialog/dialog_main.js");
$templatePage->addFileJs("./src/js/tab_add.js");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
