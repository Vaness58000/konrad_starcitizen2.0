<?php
require __DIR__.'/../../../../back/connexion.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
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

$html = file_get_contents(__DIR__.'/../../template/profile.html', "r");
$html = str_replace("[#CITIZEN_USER_ID#]", $id, $html);
$html = str_replace("[#CITIZEN_USER_PSEUDO#]", $pseudo, $html);
$html = str_replace("[#CITIZEN_USER_EMAIL#]", $email, $html);
$html = str_replace("[#CITIZEN_USER_ERR#]", $err, $html);
echo $html;
