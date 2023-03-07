<?php
// Démarrage de la session 
include __DIR__.'/../../../src/repository/categories/CatArmRepository.php';
require __DIR__.'/../../../src/class/classMain/TemplatePage.php';
require __DIR__.'/../function/table-admin.php';
include __DIR__.'/../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    die("Merci de vous connecter.");
} else {
    $name = 'delete_img_obj_info';
    $file = __DIR__.'/../../../upload/files/'.$name.'.json';
    $current = json_encode($_POST);
    file_put_contents($file, $current);
    echo $name;
}