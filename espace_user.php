<?php
session_start();
require_once 'back/connexion.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $dbco->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch(PDO::FETCH_ASSOC);

?>
<?php
include "header.php"
?>

<section id="page_user">

    <div class="haut_espace">
        <h1>Bienvenue <?php echo $data['pseudo']; ?></h1>

    </div>
    </div>