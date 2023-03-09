<?php
require __DIR__ . '/../../../back/connexion.php';
include __DIR__.'/../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige
if(!$sessionUser->isConnected()) {
    header('Location: ?ind=login');
    die();
}
// On récupere les données de l'utilisateur
$req = $dbco->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch(PDO::FETCH_ASSOC);

$sth4 = $dbco->prepare("SELECT * FROM images WHERE id_client = :id");
$sth4->execute([":id" => $_SESSION['utilisateur']['id']]);

/*Retourne un tableau associatif pour chaque entrée de notre table
        *avec le nom des colonnes sélectionnées en clefs*/
$images = $sth4->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
include "header.php"
?>
<div class="user">

    <div class="card_user" data-state="#about">
        <div class="card-header_user">
            <div class="card-cover_user" style="background-image: url('img/fond_blue.jpg')"></div>
            <img class="card-avatar_user" src="img/avatar.png" alt="avatar" />
            <h1 class="card-fullname_user"><?php echo $data['pseudo']; ?></h1>

        </div>

        <div class="card-buttons_user">

            <a href="?ind=espace_user">Mon compte</a>
            <a href="?ind=gestion_screen">Gérer mes screens</a>

        </div>
        <div class="image_site">
            <h1><i class="fa-regular fa-image"></i>&ensp; Vos screens partagés</h1>
            <a href="?ind=partage_screen">+ Publier un screen</a>
            <div class="gallery_img">
                <?php //Pour afficher les infos de la base de données 
                foreach ($images as $image) {    // foreach=boucle - pour afficher les données de la base de données dans un tableau/ as $= Pour afficher chaque resultat (les entrées de la base de données)
                ?>
                    <div class="gestion_img">
                        <img src="upload/<?= ($image["name"]) ?>" />
                        <div class="suppression">
                            <a href="/../../delete-image.php?id=<?= $image["id"] ?>" title="supprimer le screen"><i class="fa-sharp fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
