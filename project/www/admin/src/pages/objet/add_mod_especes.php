<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/EspecesRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
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
$id_lieu = 0;
$cat = "";
$lieu = "";
$tab_control = "";
$gouv = "";
$souv = "";
$philo = "";
$religion = "";
$prct = ""; // premiere contact
$origin = "";
$diplo = "";
$nom = "";
$tab_info = "";
$tab_lieu = "";
$contenu = "";
$all_img = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_obj = 0;


$objetRepository = new EspecesRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $objet = $objetRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($objet)>0){
        $id_obj = intval($_GET['id']);
        $nom = $objet['nom'];
        $contenu = $objet['contenu'];
        $gouv = $objet['gouvernence'];
        $souv = $objet['souverainete'];
        $philo = $objet['philosophie'];
        $religion = $objet['religion'];
        $prct = $objet['pre_contact']; // premiere contact
        $origin = $objet['origine'];
        $isProprietaire = $objet['id_user'] == $id;
        $id_cat = intval($objet['id_categ_espece']);
        $id_lieu = intval($objet['id_lieu']);
        $validation = (intval($objet['validation']) == 1);

        $imgs = $objetRepository->findAllImgObj($id_obj);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImg($value['id_image_obj'], 'especes', $value['src'], $value['alt']);
            }
        }

        $infos = $objetRepository->findAllInfObj($id_obj);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $diplomaties = $objetRepository->findAllIdAndDiplomatie(intval($objet['id_espece']));
        if(!empty($diplomaties)) {
            foreach ($diplomaties as $value) {
                $diplo .= "\n".addTdTabSupl($value['id_diplo_esp'], $value['type'], 'services');
            }
        }

        $controle = $objetRepository->findAllIdAndControle(intval($objet['id_espece']));
        if(!empty($controle)) {
            foreach ($controle as $value) {
                $tab_control .= "\n".addTdTabSupl($value['id_control_lieu'], $value['nom_lieu'], 'services');
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

$cat_list = $objetRepository->findListCat();
if(!empty($cat_list)) {
    foreach ($cat_list as $value) {
        $cat .= "\n".addOptionCat($value['id_categ_espece'], $value['nom'], $id_cat);
    }
}

$lieuxRepository = new LieuxRepository();
$lieux_list = $lieuxRepository->findAll();
if(!empty($lieux_list)) {
    foreach ($lieux_list as $value) {
        $lieu .= "\n".addOptionCat($value['id_lieu_princ'], $value['nom_obj'], $id_lieu);
    }
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/add_mod_especes.html');
$templatePage->addVarString("[#CITIZEN_ESPECES_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_ESPECES_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_ESPECES_TAB_INFO#]", $tab_info);
$templatePage->addVarString("[#CITIZEN_ESPECES_TAB_CONTROLLER#]", $tab_control);
$templatePage->addVarString("[#CITIZEN_ESPECES_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_ESPECES_IMG#]", $all_img);
$templatePage->addVarString("[#CITIZEN_ESPECES_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_ESPECES_ID#]", $id_obj);
$templatePage->addVarString("[#CITIZEN_ESPECES_CAT#]", $cat);
$templatePage->addVarString("[#CITIZEN_ESPECES_LIEU#]", $lieu);
$templatePage->addVarString("[#CITIZEN_ESPECES_GOUV#]", $gouv);
$templatePage->addVarString("[#CITIZEN_ESPECES_SOUV#]", $souv);
$templatePage->addVarString("[#CITIZEN_ESPECES_PHILO#]", $philo);
$templatePage->addVarString("[#CITIZEN_ESPECES_RELIGION#]", $religion);
$templatePage->addVarString("[#CITIZEN_ESPECES_PRCT#]", $prct); // premiere contact
$templatePage->addVarString("[#CITIZEN_ESPECES_ORIGINE#]", $origin);
$templatePage->addVarString("[#CITIZEN_ESPECES_TAB_DIPLO#]", $diplo);

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");
$templatePage->addFileJs("./src/js/ad_mod.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();