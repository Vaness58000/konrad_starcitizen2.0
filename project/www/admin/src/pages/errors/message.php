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

function text_display(?string $text): ?string {
    if(empty(trim($text))) {
        return "";
    }
    $text = str_replace("\n", "<br/><br/>", $text);
    return trim(trim(trim(trim($text), "<br/>")), "<br/>");
}

function error_tab_glob(?array $tab): ?string {
    if(empty($tab)) {
        $text = array();
    }
    $text = "<pre>";
    $text .= print_r($tab, true);
    $text .= "</pre>";
    return $text;
}

$id_error = intval($_GET['id']);
$error_date = "";
$error_num = "";
$error_lien = "";
$error_message = "";
$error_detail = "";
$error_contenu = "";
$get = "";
$post = "";
$cookie = "";
$env = "";
$files = "";
$request = "";
$server = "";
$session = "";

$error_log = new Error_Log();
$errorContenu = $error_log->load();
$contenuOneError = array();
if(!empty($errorContenu)) {
    if(array_key_exists($id_error, $errorContenu)) {
        $contenuOneError = $errorContenu[$id_error];
    }
}
if(!empty($contenuOneError)) {
    $error_date = date('d/m/Y H:i:s', strtotime($contenuOneError['date']));
    $error_num = $contenuOneError['nmerror'];
    $error_lien = $contenuOneError['lien'];
    $error_all = explode("<br/>", text_display($contenuOneError['message']), 2);
    $error_message = text_display($error_all[0]);
    if(count($error_all) > 1) {
        $error_detail = text_display($error_all[1]);
    }
    $get = error_tab_glob($contenuOneError['global']['_GET']);
    $post = error_tab_glob($contenuOneError['global']['_POST']);
    $cookie = error_tab_glob($contenuOneError['global']['_COOKIE']);
    $env = error_tab_glob($contenuOneError['global']['_ENV']);
    $files = error_tab_glob($contenuOneError['global']['_FILES']);
    $request = error_tab_glob($contenuOneError['global']['_REQUEST']);
    $server = error_tab_glob($contenuOneError['global']['_SERVER']);
    $session = error_tab_glob($contenuOneError['global']['_SESSION']);
}

$templatePage = new TemplatePage(__DIR__.'/../../template/errors/message.html');
//$templatePage->addVarString("[#CITIZEN_error_ERROR#]", $error_error);

$templatePage->addVarString("[#CITIZEN_ERROR_DATE#]", $error_date);
$templatePage->addVarString("[#CITIZEN_ERROR_LIEN#]", $error_lien);
$templatePage->addVarString("[#CITIZEN_ERROR_NUMERO#]", $error_num);
$templatePage->addVarString("[#CITIZEN_ERROR_MESSAGE#]", $error_message);
$templatePage->addVarString("[#CITIZEN_ERROR_DETAIL#]", $error_detail);
$templatePage->addVarString("[#CITIZEN_ERROR_CONTENU#]", $error_contenu);

$templatePage->addVarString("[#CITIZEN_ERROR_GET#]", $get);
$templatePage->addVarString("[#CITIZEN_ERROR_POST#]", $post);
$templatePage->addVarString("[#CITIZEN_ERROR_COOKIE#]", $cookie);
$templatePage->addVarString("[#CITIZEN_ERROR_ENV#]", $env);
$templatePage->addVarString("[#CITIZEN_ERROR_FILES#]", $files);
$templatePage->addVarString("[#CITIZEN_ERROR_REQUEST#]", $request);
$templatePage->addVarString("[#CITIZEN_ERROR_SERVER#]", $server);
$templatePage->addVarString("[#CITIZEN_ERROR_SESSION#]", $session);

//$templatePage->addFileJs("./src/js/error_error.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();