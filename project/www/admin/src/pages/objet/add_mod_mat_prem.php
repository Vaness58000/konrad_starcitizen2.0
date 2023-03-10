<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/MatierePremiereRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/categories/CatMatPremRepository.php';
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

$objRepository = new MatierePremiereRepository();
$id_type_objet = $objRepository->findIdTypeMatierePremiere();

$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$cat = "";
$id_cat = 0;
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_obj = 0;

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_obj = intval($_GET['id']);
        $nom = $objet['nom'];
        $contenu = $objet['contenu'];
        $id_cat = intval($objet['id_categorie']);
        $isProprietaire = $objet['id_user'] == $id;
        $validation = (intval($objet['validation']) == 1);

        $id_img_main = 0;
        $img_main = $objRepository->imagePrincipale(intval($_GET['id']));
        if(!empty($img_main)) {
            $id_img_main = $img_main["id_image_obj"];
        }

        $imgs = $objRepository->findAllImgObj($id_obj);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImgAndPrinc($value['id_image_obj'], 'mat_prem', $value['src'], $value['alt'], $id_img_main);
            }
        }

        $infos = $objRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $lieux = $objRepository->findAllIdAndLieux(intval($objet['id_mat_prem']));
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_lieu_prod'], $value['nom_lieu'], 'lieu', $value['id_lieu_prod']);
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

$catMatPremRepository = new CatMatPremRepository();
$mat_prem_cat_list = $catMatPremRepository->findAllOrder(true);
if(!empty($mat_prem_cat_list)) {
    foreach ($mat_prem_cat_list as $value) {
        $cat .= "\n".addOptionCat($value['id'], $value['nom'], $id_cat);
    }
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_mat_prem.html');
$templatePage->addVarString("[#CITIZEN_MAT_PRE_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_TAB_LIEU#]", $tab_lieu);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_CAT#]", $cat);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_MAT_PRE_ID#]", $id_obj);
$templatePage->addVarString("[#CITIZEN_TYPE_OBJ#]", $id_type_objet);

$templatePage->addFileCss("./src/css/style_dialog.css");

$templatePage->addFileJs("./src/js/objet/mat_prem.js");
$templatePage->addFileJs("./src/js/img/all_img_user.js");
$templatePage->addFileJs("./src/js/dialog/dialog_main.js");
/*$templatePage->addFileJs("./src/js/tab_add.js");*/

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
