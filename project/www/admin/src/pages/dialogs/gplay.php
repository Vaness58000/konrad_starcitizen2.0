<?php
session_start();

include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatTypeArticlesRepository.php';
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
$id_gplay = 0;
$list_gplay = "";

if(!empty($_POST) && array_key_exists("idShow", $_POST) && !empty($_POST["idShow"])) {
    $id_gplay = intval($_POST["idShow"]);
}

$catTypeArticlesRepository = new CatTypeArticlesRepository();
$gplay_base = $catTypeArticlesRepository->findAllOrder(true);
if(!empty($gplay_base)) {
    foreach ($gplay_base as $value) {
        $list_gplay .= "\n".addOptionCat($value['id'], $value['nom'], $id_gplay);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/gplay.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_GPLAY#]", $list_gplay);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}