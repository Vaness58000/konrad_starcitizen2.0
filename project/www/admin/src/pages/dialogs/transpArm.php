<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/ArmeVaissRepository.php';
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
$id_transp_arm = 0;
$list_transp_arm = "";

if(!empty($_POST) && array_key_exists("idShow", $_POST) && !empty($_POST["idShow"])) {
    $id_transp_arm = intval($_POST["idShow"]);
}

$armeVaissRepository = new ArmeVaissRepository();
$transp_arm_base = $armeVaissRepository->findAllOrder(true);
if(!empty($transp_arm_base)) {
    foreach ($transp_arm_base as $value) {
        $list_transp_arm .= "\n".addOptionCat($value['id_arm_vaiss'], $value['nom_arm'], $id_transp_arm);
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/dialog/transpArm.html');
$templatePage->addVarString("[#CITIZEN_DIALOG_LIEU#]", $list_transp_arm);
$templatePage->addVarString("[#CITIZEN_DIALOG_ISPRO#]", $ispro);

if($error_Log->isError()) {
    header("Status: 500");
}else {
    echo "true[#CITIZEN-DATE#]".$templatePage->html();
}