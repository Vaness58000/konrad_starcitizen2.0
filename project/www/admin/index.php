<?php 
include __DIR__.'/../src/class/classSite/Config.php';
include __DIR__.'/../src/class/classMain/TemplatePage.php';
include __DIR__.'/../src/class/classMain/Error_Log.php';
include __DIR__.'/../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige

$get_ind = "espace_user";
if(!empty($_GET['ind'])) {
    $get_ind = $_GET['ind'];
}
if(!$sessionUser->isConnected()) {
    header('Location: ./../?ind=login');
}

$error_Log = new Error_Log();
$templateIndex = new TemplatePage(__DIR__.'/src/template/header_footer.html');
$templateMenuAdmin = new TemplatePage(__DIR__.'/src/template/menu_admin.html');
$no_session = new TemplatePage(__DIR__.'/src/template/session/no_session.html');
$one_session = new TemplatePage(__DIR__.'/src/template/session/one_session.html');
$menu_session = $no_session->html();
$js = "";
$css = "";
$contenu = "";
$add_menu_admin = "";

$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();

$templateMenuAdmin->addFileCss("./src/css/style_admin.css");

if($isAdmin) {
    $add_admin_session = new TemplatePage(__DIR__.'/src/template/session/add_admin.html');
    $add_menu_admin = $add_admin_session->html();
}

if (isset($_SESSION['user'])) {
    $menu_session = $one_session->html();
}

include __DIR__.'/src/pages/users/espace_user.php';

if($get_ind == "acc") {
}

include __DIR__.'/src/pages/index/index_obj.php';
include __DIR__.'/src/pages/index/index_cat.php';
include __DIR__.'/src/pages/index/index_user.php';


if(!empty($templatePage)) {
    $js = $templatePage->js();
    $css = $templatePage->css();
    $contenu = $templatePage->html();
}

if($get_ind != "connexion" && $get_ind != "inscription_traitement" && $get_ind != "deconnexion") {
    $templateMenuAdmin->addVarString("[#CITIZEN_INDEX_PAGE_ADMIN#]", $contenu);
    $contenu = $templateMenuAdmin->html();
    $templateIndex->addVarString("[#CITIZEN_INDEX_SESSION#]", $menu_session);
    $templateIndex->addVarString("[#CITIZEN_INDEX_CSS#]", $templateMenuAdmin->css().$css);
    $templateIndex->addVarString("[#CITIZEN_INDEX_PAGE#]", $contenu);
    $templateIndex->addVarString("[#CITIZEN_INDEX_JS#]", $templateMenuAdmin->js().$js);
    $templateIndex->addVarString("[#CITIZEN_INDEX_ADD_MENU_ADMIN#]", $add_menu_admin);
    if($error_Log->isError()) {
        header("Status: 500");
    }else {
        echo $templateIndex->html();
    }
}
