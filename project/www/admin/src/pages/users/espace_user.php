<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
require __DIR__.'/../../../../back/connexion.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    header('Location: ../?ind=login');
    die();
}

// On récupere les données de l'utilisateur
$req = $dbco->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch(PDO::FETCH_ASSOC);

$email = $data['email'];
$pseudo = $data['pseudo'];
$id = $data["id_client"];
$err = "";

if (isset($_GET['err'])) {
    $err = htmlspecialchars($_GET['err']);
    switch ($err) {
        case 'current_password':
            $err = "<div class='alert alert-danger'>✘ Votre mot de passe actuel est incorrect</div>";
            break;

        case 'success_password':
            $err = "<div class='alert alert-success'>✔ Votre mot de passe a bien été modifié ! </div>";
            break;
    }
}

$templatePage = new TemplatePage(__DIR__.'/../../template/profile.html');
$templatePage->addVarString("[#CITIZEN_USER_ID#]", $id);
$templatePage->addVarString("[#CITIZEN_USER_PSEUDO#]", $pseudo);
$templatePage->addVarString("[#CITIZEN_USER_EMAIL#]", $email);
$templatePage->addVarString("[#CITIZEN_USER_ERR#]", $err);

$templatePage->addFileJs("./../src/js/modale.js");

$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();
