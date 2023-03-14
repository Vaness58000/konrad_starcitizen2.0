<?php
require __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
require __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ./../?ind=loginin');
    die();
}

$page = 0;
if (!empty($_GET) && array_key_exists('pg', $_GET) && !empty($_GET['pg'])) {
    $page = intval($_GET['pg']-1);
}

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();
$nb_par_pg = 10;
$choix_tab = "";
$nom_pg = "";
$folder_img = "";
$isAll = false;

$templatePage = new TemplatePage(__DIR__.'/../../template/objet/objet.html');
/*if($isAdmin && !empty($_GET) && array_key_exists('tab_all', $_GET) && !empty($_GET["tab_all"])) {
    $isAll = true;
    $templatePage = new TemplatePage(__DIR__.'/../../template/objet/objet_all.html');
}*/
