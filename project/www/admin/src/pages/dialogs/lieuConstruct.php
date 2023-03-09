<?php
include __DIR__.'/../../../../src/repository/ArticleRepository.php';
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
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
$contenu = "";
$imgs = "";
$ispro = "";
$id_lieux = 0;
$list_lieu = "";
$id_constructlieux = 0;

if(!empty($_POST) && array_key_exists("id", $_POST) && !empty($_POST["id"])) {
    $id_constructlieux = intval($_POST["id"]);
}

$articleRepository = new ArticleRepository();
$lieuConstruct_base = $constructeurRepository->findLieuConstLieuId($id_constructlieux);
if(!empty($lieuConstruct_base)) {
    foreach ($lieuConstruct_base as $value) {
        $id_lieux = intval($value["id_lieu"]);
    }
}

$lieuxRepository = new LieuxRepository();
$lieu_base = $lieuxRepository->findAllOrder(true);
if(!empty($lieu_base)) {
    foreach ($lieu_base as $value) {
        $list_lieu .= "\n".addOptionCat($value['id_lieu_princ'], $value['nom_obj'], $id_lieux);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/lieu.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_LIEU#]", $list_lieu);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}