<?php
include __DIR__ . '/../../../../src/class/classMain/TemplatePage.php';
include __DIR__ . '/../../../../src/class/classMain/Error_Log.php';
include __DIR__ . '/../../../../src/repository/categories/CatEquipemRepository.php';
include __DIR__ . '/../../function/table-admin.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ../?ind=login');
    die();
}

$error_Log = new Error_Log();

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();

$nom = "";
$contenu = "";
$all_img = "";
$prix = "";
$ispro = "";
$id_equipem = 0;

$catEquipemRepository = new CatEquipemRepository();

if (!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST["id"])) {
    $id_equipem = $objRepository->recupTranspIdEquipement(intval($_POST['id']));
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
