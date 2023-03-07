<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ServicesRepository.php';
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

$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_obj = 0;


$objetRepository = new ServicesRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objetRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_obj = intval($_GET['id']);
        $nom = $objet['nom'];
        $contenu = $objet['contenu'];
        $isProprietaire = $objet['id_user'] == $id;
        $validation = (intval($objet['validation']) == 1);

        $id_img_main = 0;
        $img_main = $objetRepository->imagePrincipale(intval($_GET['id']));
        if(!empty($img_main)) {
            $id_img_main = $img_main["id_image_obj"];
        }

        $imgs = $objetRepository->findAllImgObj($id_obj);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImgAndPrinc($value['id_image_obj'], 'services', $value['src'], $value['alt'], $id_img_main);
            }
        }

        $infos = $objetRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $lieux = $objetRepository->findAllIdAndLieux(intval($objet['id_service']));
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_serv_lieu'], $value['nom_lieu'], 'lieu', $value['id_lieu']);
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

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_services.html');
$templatePage->addVarString("[#CITIZEN_SERV_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_SERV_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_SERV_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_SERV_TAB_LIEU#]", $tab_lieu);
$templatePage->addVarString("[#CITIZEN_SERV_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_SERV_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_SERV_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_SERV_ID#]", $id_obj);

$templatePage->addFileCss("./src/css/style_dialog.css");

$templatePage->addFileJs("./src/js/objet/services.js");
$templatePage->addFileJs("./src/js/img/all_img_user.js");
$templatePage->addFileJs("./src/js/dialog/dialog_main.js");
/*$templatePage->addFileJs("./src/js/tab_add.js");*/

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
