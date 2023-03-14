<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
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
$img = "./../src/img/avatar.png";
$pseudo = "";
$email = "";
$id_user = !empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST['id']) ? intval($_POST['id']) : 0;
if($id_user == 0) {
    $id_user = $id;
}

$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($id_user);
if(!empty($user['src'])) {
    $img = './../upload/avatar/'.$user['src'];
}
$pseudo = $user['pseudo'];
$email = $user['email'];

$templatePage = new TemplatePage(__DIR__.'/../../template/users/modif_user.html');
$templatePage->addVarString("[#CITIZEN_USER_ID#]", $id_user);
$templatePage->addVarString("[#CITIZEN_USER_IMG#]", $img);
$templatePage->addVarString("[#CITIZEN_USER_PSEUDO#]", $pseudo);
$templatePage->addVarString("[#CITIZEN_USER_EMAIL#]", $email);

$templatePage->addFileJs("./src/js/users/users.js");
$templatePage->addFileJs("./src/js/img/all_img_user.js");

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}
