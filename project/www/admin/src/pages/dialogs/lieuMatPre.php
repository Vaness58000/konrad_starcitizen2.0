<?php
session_start();

include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/repository/MatierePremiereRepository.php';
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
$id_lieu = 0;
$id_lieu_mat_pre = 0;
$list_lieu = "";
$prix_vente = "";
$prix_achat = "";
$actu_min = "";
$inv_max = "";

if(!empty($_POST) && array_key_exists("idShow", $_POST) && !empty($_POST["idShow"])) {
    $id_lieu_mat_pre = intval($_POST["idShow"]);
}

$matierePremiereRepository = new MatierePremiereRepository();
$info_lieu_mat_pre = $matierePremiereRepository->findAllAndLieuxId($id_lieu_mat_pre);
if(!empty($info_lieu_mat_pre)) {
    $id_lieu = $info_lieu_mat_pre["id_lieu"];
    $prix_vente = $info_lieu_mat_pre["prix_vente"];
    $prix_achat = $info_lieu_mat_pre["prix_achat"];
    $actu_min = $info_lieu_mat_pre["actu_min"];
    $inv_max = $info_lieu_mat_pre["inv_max"];
}

$lieuxRepository = new LieuxRepository();
$lieu_base = $lieuxRepository->findAllOrder(true);
if(!empty($lieu_base)) {
    foreach ($lieu_base as $value) {
        $list_lieu .= "\n".addOptionCat($value['id_lieu_princ'], $value['nom_obj'], $id_lieu);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/lieuMatPre.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_LIEU#]", $list_lieu);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);
$templatePage->addVarString("[#CITIZEN_DIALOG_PRIX_VENT#]", $prix_vente);
$templatePage->addVarString("[#CITIZEN_DIALOG_PRIX_ACHAT#]", $prix_achat);
$templatePage->addVarString("[#CITIZEN_DIALOG_ACTU_MIN#]", $actu_min);
$templatePage->addVarString("[#CITIZEN_DIALOG_INV_MAX#]", $inv_max);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}