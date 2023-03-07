<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/TransportRepository.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/ArmeVaissRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatTranspRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatDispRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatTypeTranspRepository.php';
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

$id_cat = 0;
$id_disp = 0;
$id_type = 0;
$id_construct = 0;
$cat = "";
$disp= "";
$type = "";
$construct = "";
$tab_lieu = "";
$prix = "";
$equipage = "";
$taille = "";
$poids = "";
$vitessemax = "";
$capacite = "";
$tab_force = "";
$tab_faibl = "";
$tab_equipem = "";
$tab_arm = "";
$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_obj = 0;


$objetRepository = new TransportRepository();
if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objetRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_obj = intval($_GET['id']);
        $nom = $objet['nom'];
        $contenu = $objet['contenu'];
        $prix = $objet['prix'];
        $equipage = $objet['equipage'];
        $taille = $objet['taille'];
        $poids = $objet['poids'];
        $vitessemax = $objet['vitesse_max'];
        $capacite = $objet['capacite'];
        $isProprietaire = $objet['id_user'] == $id;
        $id_cat = intval($objet['categorie']);
        $id_disp = intval($objet['id_disponible']);
        $id_type = intval($objet['type']);
        $id_construct = intval($objet['id_construct']);
        $validation = (intval($objet['validation']) == 1);

        $id_img_main = 0;
        $img_main = $objetRepository->imagePrincipale(intval($_GET['id']));
        if(!empty($img_main)) {
            $id_img_main = $img_main["id_image_obj"];
        }

        $imgs = $objetRepository->findAllImgObj($id_obj);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImgAndPrinc($value['id_image_obj'], 'transport', $value['src'], $value['alt'], $id_img_main);
            }
        }

        $infos = $objetRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $lieux = $objetRepository->findAllIdAndLieux(intval($objet['id_transp']));
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_transp_lieu'], $value['nom_lieu'], 'lieu', $value['id_lieu'], $value['id_lieu']);
            }
        }

        $forces = $objetRepository->findAllIdAndForce(intval($objet['id_transp']));
        if(!empty($forces)) {
            foreach ($forces as $value) {
                $tab_force .= "\n".addTdTabSupl($value['id_transp_forces'], $value['nom_force'], 'force', $value['id_force']);
            }
        }

        $faibls = $objetRepository->findAllIdAndFaibl(intval($objet['id_transp']));
        if(!empty($faibls)) {
            foreach ($faibls as $value) {
                $tab_faibl .= "\n".addTdTabSupl($value['id_transp_faibl'], $value['nom_faiblesse'], 'faibl', $value['id_faiblesse']);
            }
        }

        $equipems = $objetRepository->findAllIdAndEquipem(intval($objet['id_transp']));
        if(!empty($equipems)) {
            foreach ($equipems as $value) {
                $tab_equipem .= "\n".addTdTabSupl($value['id_transp_equip'], $value['nom'], 'equip', $value['id_equipem']);
            }
        }

        $armeVaissRepository = new ArmeVaissRepository();
        $list_arm = $armeVaissRepository->findAllTranspId(intval($objet['id_transp']));
        if(!empty($list_arm)) {
            foreach ($list_arm as $value) {
                $tab_arm .= "\n".addTdTabSupl($value['id_transport_arm'], $value['nom_arm'], 'arm', $value['id_arm_transp']);
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

$catDispRepository = new CatDispRepository();
$disp_list = $catDispRepository->findAllOrder(true);
if(!empty($disp_list)) {
    foreach ($disp_list as $value) {
        $disp .= "\n".addOptionCat($value['id_disponibilite'], $value['nom_disponible'], $id_disp);
    }
}

$catTranspRepository = new CatTranspRepository();
$cat_list = $catTranspRepository->findAllOrder(true);
if(!empty($cat_list)) {
    foreach ($cat_list as $value) {
        $cat .= "\n".addOptionCat($value['id_transport'], $value['nom'], $id_cat);
    }
}

$catTypeTranspRepository = new CatTypeTranspRepository();
$type_list = $catTypeTranspRepository->findAllOrder(true);
if(!empty($type_list)) {
    foreach ($type_list as $value) {
        $type .= "\n".addOptionCat($value['id_type'], $value['nom'], $id_type);
    }
}

$constructeurRepository = new ConstructeurRepository();
$constructeurs = $constructeurRepository->findAllOrder(true);
if(!empty($constructeurs)) {
    foreach ($constructeurs as $value) {
        $construct .= "\n".addOptionCat($value['id_constructeur'], $value['nom'], $id_construct);
    }
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_transp.html');
$templatePage->addVarString("[#CITIZEN_TRANSP_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_TRANSP_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_TRANSP_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_TRANSP_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_TRANSP_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_TRANSP_ID#]", $id_obj);
$templatePage->addVarString("[#CITIZEN_TRANSP_CAT#]", $cat);
$templatePage->addVarString("[#CITIZEN_TRANSP_DISP#]", $disp);
$templatePage->addVarString("[#CITIZEN_TRANSP_TYPE#]", $type);
$templatePage->addVarString("[#CITIZEN_TRANSP_CONSTRUCT#]", $construct);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAB_LIEU#]", $tab_lieu);
$templatePage->addVarString("[#CITIZEN_TRANSP_PRIX#]", $prix);
$templatePage->addVarString("[#CITIZEN_TRANSP_EQUIPAGE#]", $equipage);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAILLE#]", $taille);
$templatePage->addVarString("[#CITIZEN_TRANSP_POIDS#]", $poids);
$templatePage->addVarString("[#CITIZEN_TRANSP_VITESSMAX#]", $vitessemax);
$templatePage->addVarString("[#CITIZEN_TRANSP_CAPACITE#]", $capacite);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAB_FORCE#]", $tab_force);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAB_FAIBL#]", $tab_faibl);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAB_EQUIPEM#]", $tab_equipem);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAB_EQUIPEM#]", $tab_equipem);
$templatePage->addVarString("[#CITIZEN_TRANSP_TAB_ARM#]", $tab_arm);

$templatePage->addFileCss("./src/css/style_dialog.css");

$templatePage->addFileJs("./src/js/objet/transports.js");
$templatePage->addFileJs("./src/js/img/all_img_user.js");
$templatePage->addFileJs("./src/js/dialog/dialog_main.js");
/*$templatePage->addFileJs("./src/js/tab_add.js");*/

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
