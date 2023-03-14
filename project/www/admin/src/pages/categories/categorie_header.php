<?php
require __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
require __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ./../?ind=login');
    die();
}

$page = 0;
if (!empty($_GET) && array_key_exists('pg', $_GET) && !empty($_GET['pg'])) {
    $page = intval($_GET['pg']-1);
}

$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($_SESSION['utilisateur']['id']);

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();;
$img = "./src/images/plus-square.svg";
$nb_par_pg = 10;
$nb_pg = 0;
$id_cat = 0;
$count = 0;
$isProprietaire = false;
$nom_pg = "";
$nom_cat = "";
$list_cat = "";
$contenu_cat = array();
$tabJS = array();
$tabCSS = array();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    $id_cat = intval($_GET['id']);
}