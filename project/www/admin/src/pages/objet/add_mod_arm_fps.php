<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ArmeFpsRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatArmRepository.php';
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
$id_const = 0;
$cat = "";
$const = "";
$poids = "";
$portee = "";
$perte = "";
$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_obj = 0;


$objetRepository = new ArmeFpsRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objetRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_obj = intval($_GET['id']);
        $nom = $objet['nom_obj'];
        $poids = $objet['poids'];
        $portee = $objet['portee'];
        $perte = $objet['perte'];
        $id_cat = intval($objet['id_cat']);
        $id_const = intval($objet['id_construct']);
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
                $all_img .= "\n".addImgAndPrinc($value['id_image_obj'], 'armement_fps', $value['src'], $value['alt'], $id_img_main);
            }
        }

        $infos = $objetRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }
        
        $lieux = $objetRepository->findAllIdAndLieux(intval($objet['id_arm_fps']));
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $lieu = $value['nom_lieu'];
                $couleur = $value['nom_couleur'];
                if(!empty($couleur)) {
                    $lieu .= " / ".$couleur;
                }
                $tab_lieu .= "\n".addTdTabSupl($value['id_lieu'], $lieu, 'lieu');
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

$catArmRepository = new CatArmRepository();
$cat_list = $catArmRepository->findAllOrder(true);
if(!empty($cat_list)) {
    foreach ($cat_list as $value) {
        $cat .= "\n".addOptionCat($value['id_categ_arme'], $value['nom'], $id_cat);
    }
}

$constructeurRepository = new ConstructeurRepository();
$constructeurs = $constructeurRepository->findAllOrder(true);
if(!empty($constructeurs)) {
    foreach ($constructeurs as $value) {
        $const .= "\n".addOptionCat($value['id_constructeur'], $value['nom'], $id_const);
    }
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_arm_fps.html');
$templatePage->addVarString("[#CITIZEN_ARM_FPS_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_TAB_LIEU#]", $tab_lieu);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_ID#]", $id_obj);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_CAT#]", $cat);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_CONST#]", $const);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_POIDS#]", $poids);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_PORTEE#]", $portee);
$templatePage->addVarString("[#CITIZEN_ARM_FPS_PERTE#]", $perte);

$templatePage->addFileCss("./src/css/style_dialog.css");

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");
$templatePage->addFileJs("./src/js/ad_mod.js");
$templatePage->addFileJs("./src/js/dialog/dialog_main.js");
$templatePage->addFileJs("./src/js/tab_add.js");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
