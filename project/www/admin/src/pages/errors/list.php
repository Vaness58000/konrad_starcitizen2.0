<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../function/table-admin.php';
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
if($page < 0) {
    $page = 0;
}

$nb_par_pg = 10;

$error_log = new Error_Log();
$errorContenu = $error_log->load();
$keys = array_keys($errorContenu);
$count = ceil(count($errorContenu)/$nb_par_pg);

if($page >= $count) {
    $page = $count-1;
}
$start_line = $page * $nb_par_pg;
$end_line = $start_line + $nb_par_pg;

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();

$list_error = "";


$nbDisplay = count($errorContenu) <= $end_line ? count($errorContenu) : $end_line;
$tab = [$page, $nb_par_pg, $start_line, $end_line, $count, $nbDisplay, count($errorContenu)];
if(!empty($errorContenu)) {
    for ($i=$start_line; $i < $nbDisplay; $i++) { 
        $date = date('d/m/Y H:i:s', strtotime($errorContenu[$i]['date']));
        $msg = explode("\n", str_replace("\r", "\n",$errorContenu[$i]['message']))[0];
        $list_error .= addTdError($i, $date, $msg);
    }
}
$templatePage = new TemplatePage(__DIR__.'/../../template/errors/list.html');
$templatePage->addVarString("[#CITIZEN_LIST_ERROR#]", $list_error);
$templatePage->addVarString("[#CITIZEN_LIST_ERROR_NBPG#]", $count);
$templatePage->addVarString("[#CITIZEN_LIST_ERROR_NMPG#]", ($page+1));

$templatePage->addFileJs("./src/js/errors/list_error.js");
$templatePage->addFileJs("./src/js/pagination.js");
$templatePage->addFileCss("./src/css/pagination.css");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/