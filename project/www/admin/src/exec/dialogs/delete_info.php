<?php
include __DIR__ . '/../../../../src/class/classMain/TemplatePage.php';
include __DIR__ . '/../../../../src/class/classMain/Error_Log.php';
include __DIR__ . '/../../../../src/repository/ObjetRepository.php';
include __DIR__ . '/../../function/table-admin.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'delete_info';
    $file = __DIR__.'/../../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    echo $name;
}
