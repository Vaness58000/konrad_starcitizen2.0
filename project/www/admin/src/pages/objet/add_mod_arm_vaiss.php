<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ArmeVaissRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
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

$id_taille = 0;
$id_const = 0;
$taille = "";
$const = "";
$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_obj = 0;


$objetRepository = new ArmeVaissRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objetRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_obj = intval($_GET['id']);
        $nom = $objet['nom'];
        $contenu = $objet['contenu'];
        $id_taille = intval($objet['id_taille']);
        $id_const = intval($objet['id_construct']);
        $isProprietaire = $objet['id_user'] == $id;
        $validation = (intval($objet['validation']) == 1);

        $imgs = $objetRepository->findAllImgObj($id_obj);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImg($value['id_image_obj'], 'armement_vaiss', $value['src'], $value['alt']);
            }
        }

        $infos = $objetRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $lieux = $objetRepository->findAllIdAndLieux($objet['arm_vaiss_fps']);
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_lieu'], $value['nom_lieu'], 'services');
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

$tailles = $objetRepository->findListTaille();
if(!empty($tailles)) {
    foreach ($tailles as $value) {
        $taille .= "\n".addOptionCat($value['id'], $value['taille'], $id_taille);
    }
}

$constructeurRepository = new ConstructeurRepository();
$constructeurs = $constructeurRepository->findAll();
if(!empty($constructeurs)) {
    foreach ($constructeurs as $value) {
        $const .= "\n".addOptionCat($value['id_constructeur'], $value['nom'], $id_const);
    }
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_arm_vaiss.html');
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_TAB_LIEU#]", $tab_lieu);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_ID#]", $id_obj);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_TAILLE#]", $taille);
$templatePage->addVarString("[#CITIZEN_ARM_VAISS_CONST#]", $const);

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");
$templatePage->addFileJs("./src/js/ad_mod.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
