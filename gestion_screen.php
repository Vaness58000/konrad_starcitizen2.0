<?php
session_start();
require_once 'back/connexion.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
    die();
}
$sth4 = $dbco->prepare("SELECT * FROM images WHERE id_client = :id");
$sth4->execute([":id" => $_SESSION['utilisateur']['id']]);

/*Retourne un tableau associatif pour chaque entrée de notre table
        *avec le nom des colonnes sélectionnées en clefs*/
$images = $sth4->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
include "header.php"
?>

<div class="image_site">
    <h1><i class="fa-regular fa-image"></i>&ensp; Vos screens partagés</h1>
    <div class="gallery_img">
        <?php //Pour afficher les infos de la base de données 
        foreach ($images as $image) {    // foreach=boucle - pour afficher les données de la base de données dans un tableau/ as $= Pour afficher chaque resultat (les entrées de la base de données)
        ?>
            <div class="gestion_img">
                <img src="upload/<?= ($image["name"]) ?>" />
                <a href="src/delete_image.php?id=<?= $image["id"] ?>">Supprimer le screen</a>
            </div>
        <?php } ?>

    </div>
</div>