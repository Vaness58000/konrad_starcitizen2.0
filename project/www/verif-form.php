<?php
session_start();
require "back/connexion.php";

if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher")
{
 $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
 $terme = $_GET['terme'];
 $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
 $terme = strip_tags($terme); //pour supprimer les balises html dans la requête

 if (isset($terme))
 {
  $terme = strtolower($terme);
  $select_terme = $dbco->prepare("SELECT id FROM vaisseau WHERE nom_vaisseau LIKE ? OR constructeur LIKE ?");
  $select_terme->execute(array("%".$terme."%", "%".$terme."%"));
  $vaisseau = $select_terme->fetchAll();
 }
 else
 {
  $message = "Vous devez entrer votre requete dans la barre de recherche";
 }
 if (isset($vaisseau[0])){
 header("Location:vaisseau_ind.php?page=".$vaisseau[0]['id']);
}else{
 header("Location:recherche_non_aboutie.php");
  
}
}
