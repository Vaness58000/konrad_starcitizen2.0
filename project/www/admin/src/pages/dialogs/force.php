<?php
session_start();

include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatForcesRepository.php';
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
$id_force = 0;
$list_force = "";

if(!empty($_POST) && array_key_exists("idShow", $_POST) && !empty($_POST["idShow"])) {
    $id_force = intval($_POST["idShow"]);
}

$catForcesRepository = new CatForcesRepository();
$force_base = $catForcesRepository->findAllOrder(true);
if(!empty($force_base)) {
    foreach ($force_base as $value) {
        $list_force .= "\n".addOptionCat($value['id_force'], $value['nom_force'], $id_force);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/force.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_FORCE#]", $list_force);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}