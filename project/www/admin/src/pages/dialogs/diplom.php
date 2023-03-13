<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/categories/CatDiplomRepository.php';
include __DIR__.'/../../../../src/repository/EspecesRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ../?ind=login');
    die();
}

$error_Log = new Error_Log();

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();

$nom = "";
$traite = "";
$imgs = "";
$ispro = "";
$id_diplom = 0;

$especesRepository = new EspecesRepository();
if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST["id"])) {
    $id_diplom = $especesRepository->recupEspecIdDiplom(intval($_POST["id"]));
}

$catDiplomRepository = new catDiplomRepository();
$diplom = $catDiplomRepository->findAllId($id_diplom);
if(!empty($diplom)) {
    $nom = $diplom["type"];
    $traite = $diplom["traite"];
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/diplom.html');
$templatePage->addVarString("[#CITIZEN_ADD_DIPLOM_NOM#]", $nom);
$templatePage->addVarString("[#CITIZEN_ADD_DIPLOM_TRAITE#]", $traite);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}