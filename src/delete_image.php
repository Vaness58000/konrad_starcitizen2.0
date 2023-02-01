<?php
session_start();
require "../back/connexion.php";
if (!isset($_SESSION['utilisateur'])) {
    header('Location:index.php');
    die();
}
$deletefile=unlink('phpfile.txt');    
if(!$deletefile)
{  

echo "impossible de supprimer l'image.";    
}  

$sth = $dbco->prepare("DELETE FROM images WHERE id=:id");

        $sth->execute([":id" => $_GET["id"]]);
        header("location:../gestion_screen.php"); 
