<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ScreensRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
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

$id_screen = 0;
$img = "./src/images/plus-square.svg";
$nom = "";
$alt = "";
$validation = false;
$isProprietaire = false;
$isModif = " disabled";

$screensRepository = new ScreensRepository();

if (!empty($_GET) && array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    
    $screen = $screensRepository->findAllAndIdUser(intval($_GET['id']));
    //var_dump($screen);
    if(count($screen)>0){
        $id_screen = intval($_GET['id']);
        $isProprietaire = $screen['id_user'] == $id;
        $img = './../upload/screen/'.$screen['src'];
        $nom = $screen['name'];
        $alt = $screen['alt'];
        $validation = (intval($screen['validation']) == 1);
    }
} else {
    $isProprietaire = true;
}

if (!($isProprietaire || $isAdmin)) {
    header('Location: ./?ind=articles');
    die();
}

if ($isProprietaire) {
    $isModif = "";
}

$modif_check = ($validation) ? " checked" : "";
$modif_check .= ($isAdmin) ? "" : " disabled";


$templatePage = new TemplatePage(__DIR__.'/../../template/gameplay/add_mod_screens.html');
$templatePage->addVarString("[#CITIZEN_SCREEN_ISPRO#]", $isProprietaire);
$templatePage->addVarString("[#CITIZEN_SCREEN_ID#]", $id_screen);
$templatePage->addVarString("[#CITIZEN_SCREEN_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_SCREEN_IMG#]", $img);
$templatePage->addVarString("[#CITIZEN_SCREEN_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_SCREEN_ALT#]", $alt);

$templatePage->addFileJs("./src/js/articles.js");
$templatePage->addFileJs("./src/js/all_img_user.js");
$templatePage->addFileJs("./src/js/ad_mod.js");
$templatePage->addFileJs("./src/js/tab_add.js");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
