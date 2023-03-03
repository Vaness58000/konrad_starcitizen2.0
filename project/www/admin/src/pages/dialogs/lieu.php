<?php
session_start();

include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
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
$id_lieux = 0;
$list_lieu = "";

if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST["id"])) {
    $id_lieux = $_POST["id"];
}

$lieuxRepository = new LieuxRepository();
$lieu_base = $lieuxRepository->findAllOrder(true);
if(!empty($lieu_base)) {
    foreach ($lieu_base as $value) {
        $list_lieu .= "\n".addOptionCat($value['id_lieu_princ'], $value['nom_obj'], $id_lieux);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/lieu.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_LIEU#]", $list_lieu);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".print_r($_POST, true).$templatePage->html();
}