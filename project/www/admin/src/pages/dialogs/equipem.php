<?php
session_start();

include __DIR__ . '/../../../../src/class/classMain/TemplatePage.php';
include __DIR__ . '/../../../../src/class/classMain/Error_Log.php';
include __DIR__ . '/../../../../src/repository/UsersRepository.php';
include __DIR__ . '/../../../../src/repository/categories/CatEquipemRepository.php';
include __DIR__ . '/../../function/table-admin.php';
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
$all_img = "";
$prix = "";
$ispro = "";
$id_equipem = 0;

$catEquipemRepository = new CatEquipemRepository();

if (!empty($_POST) && array_key_exists("idShow", $_POST) && !empty($_POST["idShow"])) {
    $id_equipem = intval($_POST["idShow"]);
}

$obj = $catEquipemRepository->findAllId($id_equipem);
if (count($obj) > 0) {
    $nom = $obj['nom'];
    $contenu = $obj['description'];
    $prix = $obj['prix'];
}

$templatePage = new TemplatePage(__DIR__ . '/../../template/dialog/equipem.html');
$templatePage->addVarString("[#CITIZEN_ADD_TRANSP_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_ADD_TRANSP_PRIX#]", $prix);
$templatePage->addVarString("[#CITIZEN_ADD_TRANSP_CONTENU#]", $contenu);
/*$templatePage->addVarString("[#CITIZEN_ADD_INFO_ISPRO#]", $ispro);*/

if ($error_Log->isError()) {
    header("Status: 500");
} else {
    echo "true[#CITIZEN-DATE#]" . $templatePage->html();
}
