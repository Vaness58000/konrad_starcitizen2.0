<?php
session_start();

include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatFaiblRepository.php';
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
$id_faibl = 0;
$list_faibl = "";

if(!empty($_POST) && array_key_exists("idShow", $_POST) && !empty($_POST["idShow"])) {
    $id_faibl = intval($_POST["idShow"]);
}

$catFaiblRepository = new CatFaiblRepository();
$faibl_base = $catFaiblRepository->findAllOrder(true);
if(!empty($faibl_base)) {
    foreach ($faibl_base as $value) {
        $list_faibl .= "\n".addOptionCat($value['id_faiblesse'], $value['nom_faiblesse'], $id_faibl);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/faibl.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_FAIBL#]", $list_faibl);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}