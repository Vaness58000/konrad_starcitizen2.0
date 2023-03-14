<?php
include __DIR__ . '/../../../../src/class/classMain/TemplatePage.php';
include __DIR__ . '/../../../../src/class/classMain/Error_Log.php';
include __DIR__ . '/../../../../src/repository/ObjetRepository.php';
include __DIR__ . '/../../function/table-admin.php';
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
$all_img = "";
$ispro = "";
$id_info = 0;

$objetRepository = new ObjetRepository();

if (!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST["id"])) {
    $id_info = intval($_POST["id"]);
}

$obj = $objetRepository->findAllInfObjId($id_info);
if (count($obj) > 0) {
    $nom = $obj['nom'];
    $contenu = $obj['info'];

    $imgs = $objetRepository->findAllImgInfObj(intval($obj['id']));
    if (!empty($imgs)) {
        foreach ($imgs as $value) {
            $all_img .= "\n" . addImg($value['id'], 'info', $value['src'], $value['alt']);
        }
    }
}

$templatePage = new TemplatePage(__DIR__ . '/../../template/dialog/info.html');
$templatePage->addVarString("[#CITIZEN_ADD_INFO_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_ADD_INFO_CONTENU#]", $contenu);
$templatePage->addVarString("[#CITIZEN_ADD_INFO_IMG#]", $all_img);
/*$templatePage->addVarString("[#CITIZEN_ADD_INFO_ISPRO#]", $ispro);*/

if ($error_Log->isError()) {
    header("Status: 500");
} else {
    echo "true[#CITIZEN-DATE#]" . $templatePage->html();
}
