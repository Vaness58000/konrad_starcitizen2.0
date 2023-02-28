<?php 
session_start();
$get_ind = "espace_user";
if(!empty($_GET['ind'])) {
    $get_ind = $_GET['ind'];
}
if(!isset($_SESSION['user'])) {
    header('Location: ./../?ind=login');
}

include __DIR__.'/../src/class/classSite/Config.php';
include __DIR__.'/../src/class/classMain/TemplatePage.php';
include __DIR__.'/../src/class/classMain/Error_Log.php';
include __DIR__.'/../src/repository/UsersRepository.php';

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

$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($_SESSION['utilisateur']['id']);
$id_role = intval($user["id_role"]);
$isAdmin = $id_role == 2;

$templateMenuAdmin->addFileCss("./src/css/style_admin.css");

if($isAdmin) {
    $add_admin_session = new TemplatePage(__DIR__.'/src/template/session/add_admin.html');
    $add_menu_admin = $add_admin_session->html();
}

if (isset($_SESSION['user'])) {
    $menu_session = $one_session->html();
}

/*
./?ind=espace_user">Mon compte</a></li>
            <li><a class="radio" href="./?ind=articles">Les articles</a></li>
            <li><a class="radio" href="./?ind=screens">Les screens</a></li>
            <li><a class="radio" href="./?ind=arm_fps">L'armement FPS</a></li>
            <li><a class="radio" href="./?ind=arm_vaiss">L'armement vaisseau</a></li>
            <li><a class="radio" href="./?ind=lieux">Lieux</a></li>
            <li><a class="radio" href="./?ind=especes">Espèces</a></li>
            <li><a class="radio" href="./?ind=construct">Constructeurs</a></li>
            <li><a class="radio" href="./?ind=transports">Transports</a></li>
            <li><a class="radio" href="./?ind=proprietaires">Propriétaires</a></li>
            <li><a class="radio" href="./?ind=services">Services</a></li>
            <li><a class="radio" href="./?ind=messages">Messages</a></li>
            <li><a class="radio" href="./?ind=utilisateurs
*/
if($get_ind == "acc") {
} else if($get_ind == "espace_user") {
    include __DIR__.'/src/pages/users/espace_user.php';
} else if($get_ind == "screens" || $get_ind == "screens_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "screens_all");
    include __DIR__.'/src/pages/gameplay/screens.php';
} else if($get_ind == "add_screen" || $get_ind == "mod_screen"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/gameplay/add_mod_screens.php';
} else if($get_ind == "articles" || $get_ind == "articles_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "articles_all");
    include __DIR__.'/src/pages/gameplay/articles.php';
} else if($get_ind == "add_article" || $get_ind == "mod_article"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/gameplay/add_mod_article.php';
} else if($get_ind == "arm_fps" || $get_ind == "arm_fps_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "arm_fps_all");
    include __DIR__.'/src/pages/objet/arm_fps.php';
} else if($get_ind == "add_arm_fps" || $get_ind == "mod_arm_fps"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_arm_fps.php';
} else if($get_ind == "arm_vaiss" || $get_ind == "arm_vaiss_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "arm_vaiss_all");
    include __DIR__.'/src/pages/objet/arm_vaiss.php';
} else if($get_ind == "add_arm_vaiss" || $get_ind == "mod_arm_vaiss"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_arm_vaiss.php';
} else if($get_ind == "lieux" || $get_ind == "lieux_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "lieux_all");
    include __DIR__.'/src/pages/objet/lieux.php';
} else if($get_ind == "add_lieu" || $get_ind == "mod_lieu"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_lieux.php';
} else if($get_ind == "mat_prem" || $get_ind == "mat_prem_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "mat_prem_all");
    include __DIR__.'/src/pages/objet/mat_prem.php';
} else if($get_ind == "add_mat_prem" || $get_ind == "mod_mat_prem"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_mat_prem.php';
} else if($get_ind == "construct" || $get_ind == "construct_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "construct_all");
    include __DIR__.'/src/pages/gameplay/construct.php';
} else if($get_ind == "add_construct" || $get_ind == "mod_construct"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/gameplay/add_mod_construct.php';
} else if($get_ind == "transports" || $get_ind == "transports_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "transports_all");
    include __DIR__.'/src/pages/objet/transports.php';
} else if($get_ind == "add_transports" || $get_ind == "mod_transports"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_transp.php';
} else if($get_ind == "especes" || $get_ind == "especes_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "especes_all");
    include __DIR__.'/src/pages/objet/especes.php';
} else if($get_ind == "add_especes" || $get_ind == "mod_especes"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_especes.php';
} else if($get_ind == "proprietaires" || $get_ind == "proprietaires_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "proprietaires_all");
    include __DIR__.'/src/pages/objet/proprietaires.php';
} else if($get_ind == "add_proprietaires" || $get_ind == "mod_proprietaires"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_proprietaires.php';
} else if($get_ind == "services" || $get_ind == "services_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "services_all");
    include __DIR__.'/src/pages/objet/services.php';
} else if($get_ind == "add_service" || $get_ind == "mod_service"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/objet/add_mod_services.php';
} else if($get_ind == "messages" && $isAdmin) {
    include __DIR__.'/src/pages/users/messages.php';
} else if($get_ind == "utilisateurs" && $isAdmin) {
    include __DIR__.'/src/pages/users/users.php';
} else if($get_ind == "error_list" && $isAdmin) {
    include __DIR__.'/src/pages/errors/list.php';
} else if($get_ind == "error_msg" && $isAdmin) {
    include __DIR__.'/src/pages/errors/message.php';
} else {
    include __DIR__.'/src/pages/users/espace_user.php';
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
    }else {
        echo $templateIndex->html();
    }
}
