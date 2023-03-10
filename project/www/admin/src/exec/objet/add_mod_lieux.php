<?php
// Démarrage de la session 
include __DIR__ . '/../../../../src/class/classMain/OneImg.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'add_mod_lieux';
    $file = __DIR__.'/../../../../upload/files/'.$name.'.json';
    $tabAddListInfo = new TabAddList($_POST, "infoDataTmp");
    $tabListInfo = $tabAddListInfo->getTabList();
    $tab = [$_POST,$tabListInfo];
    $current = json_encode($tab);
    file_put_contents($file, $current);
    echo $name;
}
