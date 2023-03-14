<?php
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
require_once __DIR__.'/../../../../back/connexion.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ./../?ind=login');
    die();
}
if ($_POST){ //si quelqu'un à appuyer sur le bouton enregistrer on verifie
    if(isset($_POST["pseudo"]) && !empty($_POST["pseudo"])    
    && isset($_POST["email"]) && !empty($_POST["email"])
   
 ) {
        $id = strip_tags($_GET["id_client"]);
        $pseudo=strip_tags($_POST["pseudo"]); //strip_tags=pour securisé et que la personne qui enregistre dans le formulaire ne puisse pas mettre de balise php ou html
        $email=strip_tags($_POST["email"]);
       

        $requete="UPDATE utilisateurs SET pseudo=:pseudo, email=:email WHERE id_client=:id_client";  //Pour modifier SET nom = nouvelle valeur :nom
        $sth=$dbco->prepare($requete);
        $sth->bindValue(":id_client", $id, PDO::PARAM_INT);
        $sth->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $sth->bindValue(":email", $email, PDO::PARAM_STR);
   
        $sth->execute();


        header("Location: ./../espace_user.php");
     }else{
         echo "Vous n'avez pas rempli correctement";
     }
    }
if (isset($_GET["id_client"]) && !empty($_GET["id_client"])){ //si le champs est rempli isset = s'il existe  //&& !empty = si le champs n'est pas vides
        require_once("./../admin/connexion.php"); //alors on se connecte 
        $id=strip_tags($_GET["id_client"]);   //A SAVOIR strip_tags = protège des injections de balise où autres qui pourrait provoquer un disfonctionnement du site (securise contre les malveillances)
        
        $sth= "SELECT * FROM utilisateurs WHERE id_client=:id_client";  // selectionner tout les colonnes de la table avec l'id
        $sth=$dbco->prepare($sth);
        $sth->bindValue(":id_client", $id, PDO::PARAM_INT);

        $sth->execute();

        $data=$sth->fetch(); // pour avoir les informations prérempli de l'id selectionné dans le formulaire 
   
    
    if (!$data){ //si aucun resultat 

        header("Location: ./../espace_user.php"); //renvoi à l'index
    }

}
    else{

        header("Location: ./../espace_user.php"); //sinon renvoi à l'index
}
