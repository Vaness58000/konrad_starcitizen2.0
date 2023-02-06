<?php
require "back/connexion.php";

if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];

    $check = $dbco->prepare('SELECT id_image FROM images WHERE id_image = ?');
    $check->execute(array($getid));

    if($check->rowCount() == 1){
        if($gett == 1){
            $ins = $dbco->prepare('INSERT INTO likes (id_image) VALUES (?)');
            $ins->execute(array($getid));
        } elseif($gett == 2){
            $ins = $dbco->prepare('INSERT INTO dislikes (id_image) VALUES (?)');
            $ins->execute(array($getid));
        }
        header('Location: gallerie.php');
    }else{
    exit('erreur');
    }
}
?>