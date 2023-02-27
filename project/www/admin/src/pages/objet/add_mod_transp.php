<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/TransportRepository.php';
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

        $imgs = $objetRepository->findAllImgObj($id_obj);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImg($value['id_image_obj'], 'transport', $value['src'], $value['alt']);
            }
        }

        $infos = $objetRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $lieux = $objetRepository->findAllIdAndLieux($objet['id_transp']);
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_lieu'], $value['nom_lieu'], 'services');
            }
        }

        $forces = $objetRepository->findAllIdAndForce($objet['id_transp']);
        if(!empty($forces)) {
            foreach ($forces as $value) {
                $tab_force .= "\n".addTdTabSupl($value['id_transp_forces'], $value['nom_force'], 'services');
            }
        }

        $faibls = $objetRepository->findAllIdAndFaibl($objet['id_transp']);
        if(!empty($faibls)) {
            foreach ($faibls as $value) {
                $tab_faibl .= "\n".addTdTabSupl($value['id_transp_faibl'], $value['nom_faiblesse'], 'services');
            }
        }

        $equipems = $objetRepository->findAllIdAndEquipem($objet['id_transp']);
        if(!empty($equipems)) {
            foreach ($equipems as $value) {
                $tab_equipem .= "\n".addTdTabSupl($value['id_transp_equip'], $value['nom'], 'services');
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

$disp_list = $objetRepository->findListDisp();
if(!empty($disp_list)) {
    foreach ($disp_list as $value) {
        $disp .= "\n".addOptionCat($value['id_disponibilite'], $value['nom_disponible'], $id_disp);
    }
}

$cat_list = $objetRepository->findListCat();
if(!empty($cat_list)) {
    foreach ($cat_list as $value) {
        $cat .= "\n".addOptionCat($value['id_transport'], $value['nom'], $id_cat);
    }
}

$type_list = $objetRepository->findListType();
if(!empty($type_list)) {
    foreach ($type_list as $value) {
        $type .= "\n".addOptionCat($value['id_type'], $value['nom'], $id_type);
    }
}

$constructeurRepository = new ConstructeurRepository();
$constructeurs = $constructeurRepository->findAll();
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

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");
$templatePage->addFileJs("./src/js/ad_mod.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
