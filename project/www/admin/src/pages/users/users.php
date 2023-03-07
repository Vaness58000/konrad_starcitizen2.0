<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    header('Location: ../?ind=login');
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
$isAll = false;

$role_all = $usersRepository->findRoleAll();

$templatePage = new TemplatePage(__DIR__.'/../../template/users/users.html');
$count = ceil($usersRepository->findAllAndUserNoIdCount($id)/$nb_par_pg);
$articles = $usersRepository->findAllAndUserNoIdPage($id, $page, $nb_par_pg);
$tab_all = "";

if(!empty($articles)) {
    foreach ($articles as $value) {
        $tab_all .= "\n".addTdUserMain(intval($value['id_user']), $value['pseudo'], $value['email'], intval($value['id_role']), $role_all);
    }
}

$templatePage->addVarString("[#CITIZEN_TAB_ALL#]", $tab_all);
$templatePage->addVarString("[#CITIZEN_TAB_NBPG#]", $count);
$templatePage->addVarString("[#CITIZEN_TAB_NMPG#]", ($page+1));
$templatePage->addVarString("[#CITIZEN_TAB_CHOICE#]", $choix_tab);

$templatePage->addFileJs("./src/js/users/users.js");
/*$templatePage->addFileJs("./src/js/tab_display_all.js");*/
$templatePage->addFileJs("./src/js/pagination.js");
$templatePage->addFileCss("./src/css/pagination.css");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
