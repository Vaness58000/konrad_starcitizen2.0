<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../function/table-admin.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    header('Location: ../?ind=login');
    die();
}

$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($_SESSION['utilisateur']['id']);

$pseudo = $user['pseudo'];
$id = intval($user["idUser"]);
$id_role = intval($user["id_role"]);
$isAdmin = $id_role == 2;

$list_error = "";

$error_log = new Error_Log();
$errorContenu = $error_log->load();
if(!empty($errorContenu)) {
    foreach ($errorContenu as $key => $value) {
        $date = date('d/m/Y H:i:s', strtotime($value['date']));
        $msg = explode("\n", str_replace("\r", "\n",$value['message']))[0];
        $list_error .= addTdError($key, $date, $msg);
    }
}
$templatePage = new TemplatePage(__DIR__.'/../../template/errors/list.html');
$templatePage->addVarString("[#CITIZEN_LIST_ERROR#]", $list_error);

$templatePage->addFileJs("./src/js/errors/list_error.js");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/