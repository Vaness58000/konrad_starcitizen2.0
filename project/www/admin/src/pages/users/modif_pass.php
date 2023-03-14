<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ScreensRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ./../?ind=login');
    die();
}

$error_Log = new Error_Log();

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();

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
        if(!empty($screen['src'])) {
            $img = './../upload/screen/'.$screen['src'];
        }
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


$templatePage = new TemplatePage(__DIR__.'/../../template/users/modif_pass.html');
$templatePage->addVarString("[#CITIZEN_SCREEN_ISPRO#]", $isModif);
$templatePage->addVarString("[#CITIZEN_SCREEN_ID#]", $id_screen);
$templatePage->addVarString("[#CITIZEN_SCREEN_MODIF_CHECK#]", $modif_check);
$templatePage->addVarString("[#CITIZEN_SCREEN_IMG#]", $img);
$templatePage->addVarString("[#CITIZEN_SCREEN_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_SCREEN_ALT#]", $alt);

$templatePage->addFileJs("./src/js/users/users.js");
$templatePage->addFileJs("./src/js/img/all_img_user.js");

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}