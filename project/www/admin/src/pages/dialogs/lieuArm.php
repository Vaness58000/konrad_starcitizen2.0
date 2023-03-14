<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/ArmeRepository.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatCouleurRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ./../?ind=login');
    die();
}

$error_Log = new Error_Log();

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();

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

$armeRepository = new ArmeRepository();
if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST["id"])) {
    $id_lieux_arm = $armeRepository->recupIdArm(intval($_POST["id"]));
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