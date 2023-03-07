<?php
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ../?ind=login');
    die();
}

$pseudo = $sessionUser->getPseudo();
$id = $sessionUser->getId();
$id_role = $sessionUser->getRole();
$isAdmin = $sessionUser->isAdmin();
$email = $sessionUser->getEmail();
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

$templatePage = new TemplatePage(__DIR__.'/../../template/users/profile.html');
$templatePage->addVarString("[#CITIZEN_USER_ID#]", $id);
$templatePage->addVarString("[#CITIZEN_USER_PSEUDO#]", $pseudo);
$templatePage->addVarString("[#CITIZEN_USER_EMAIL#]", $email);
$templatePage->addVarString("[#CITIZEN_USER_ERR#]", $err);

$templatePage->addFileJs("./../src/js/modale.js");

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/
