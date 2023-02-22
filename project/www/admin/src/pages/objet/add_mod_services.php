<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ServicesRepository.php';
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
$validation = false;
$isProprietaire = false;
$isModif = " disabled";
$id_service = 0;


$servicesRepository = new ServicesRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $service = $servicesRepository->findAllAndIdUser(intval($_GET['id']));
    if(count($service)>0){
        $id_service = intval($_GET['id']);
        $nom = $service['nom'];
        $contenu = $service['contenu'];
        $isProprietaire = $service['id_user'] == $id;
        $validation = (intval($service['validation']) == 1);

        $imgs = $servicesRepository->findAllImgObj($id_service);
        if(!empty($imgs)) {
            foreach ($imgs as $value) {
                $all_img .= "\n".addImg($value['id'], 'articles', $value['src'], $value['alt']);
            }
        }

        $infos = $servicesRepository->findAllInfObj($id_service);
        if(!empty($infos)) {
            foreach ($infos as $value) {
                $tab_info .= "\n".addTdTabSupl($value['id'], $value['nom'], 'info');
            }
        }

        $lieux = $servicesRepository->findAllIdAndLieux($service['id_service']);
        if(!empty($lieux)) {
            foreach ($lieux as $value) {
                $tab_lieu .= "\n".addTdTabSupl($value['id_serv_lieu'], $value['nom_lieu'], 'lieu');
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
$templatePage->addVarString("[#CITIZEN_SERV_ID#]", $id_service);

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
