<?php
session_start();

include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatCouleurRepository.php';
include __DIR__.'/../../function/table-admin.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    header('Location: ../?ind=login');
    die();
}

$error_Log = new Error_Log();

$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($_SESSION['utilisateur']['id']);

$pseudo = $user['pseudo'];
$id = intval($user["idUser"]);
$id_role = intval($user["id_role"]);
$isAdmin = $id_role == 2;

$nom = "";
$contenu = "";
$imgs = "";
$ispro = "";
$id_lieux_arm = 0;
$id_lieu = 0;
$list_lieu = "";
$id_couleur = 0;
$couleur = "";
$prix = "";

if(!empty($_POST) && array_key_exists("idShow", $_POST) && !empty($_POST["idShow"])) {
    $id_lieux_arm = intval($_POST["idShow"]);
}

$lieuxRepository = new LieuxRepository();
$info_lieu_arm = $lieuxRepository->findAllAndLieuxArmId($id_lieux_arm);
if(!empty($info_lieu_arm)) {
    $id_lieu = $info_lieu_arm["id_lieu"];
    $id_couleur = $info_lieu_arm["id_couleur"];
    $prix = $info_lieu_arm["prix"];
}

$lieu_base = $lieuxRepository->findAllOrder(true);
if(!empty($lieu_base)) {
    foreach ($lieu_base as $value) {
        $list_lieu .= "\n".addOptionCat($value['id_lieu_princ'], $value['nom_obj'], $id_lieu);
    }
}


$catCouleurRepository = new CatCouleurRepository();
$couleur_base = $catCouleurRepository->findAllOrder(true);
if(!empty($couleur_base)) {
    foreach ($couleur_base as $value) {
        $couleur .= "\n".addOptionCat($value['id'], $value['nom'], $id_couleur);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/lieuArm.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_LIEU#]", $list_lieu);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);
$templatePage->addVarString("[#CITIZEN_DIALOG_COULEUR#]", $couleur);
$templatePage->addVarString("[#CITIZEN_DIALOG_PRIX#]", $prix);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}