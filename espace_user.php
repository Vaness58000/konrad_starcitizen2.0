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

$sth4 = $dbco->prepare("SELECT * FROM images WHERE id_client = :id");
$sth4->execute([":id" => $_SESSION['utilisateur']['id']]);

/*Retourne un tableau associatif pour chaque entrée de notre table
        *avec le nom des colonnes sélectionnées en clefs*/
$images = $sth4->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
include "header.php"
?>

<section id="page_user">

    <div class="haut_espace">
        <h1>Bienvenue <?php echo $data['pseudo']; ?></h1>



        <form class="form" method="post" action="src/recup_form_image.php" enctype="multipart/form-data">
            <div class="form--header-container">
                <h1 class="form--header-title">
                    <i class="fa-regular fa-image"></i> Partager vos screens
                </h1>

                <p class="form--header-text">
                    Merci de télécharger les screens que vous souhaitez partager avec nous.
                </p>
            </div>
            <div id="image">

                <p>Sélectionner vos images (attention : vérifiez que les images téléchargées sont libres de droits)</p>
                <input type="file" name='files[]' multiple>
                </br>
            </div>

            <button type="submit" name="submit" class="form__btn" id="btn-2-next">Suivant</button>

            <h2>Gestion de vos screens partagés</h2>
            <div class="gallery_img">
                <?php //Pour afficher les infos de la base de données 
                foreach ($images as $image) {    // foreach=boucle - pour afficher les données de la base de données dans un tableau/ as $= Pour afficher chaque resultat (les entrées de la base de données)
                ?>
                    <div class="gestion_image">
                        <div class="image_personnalisation">
                            <img src="upload/<?= ($image["name"]) ?>" />
                        </div>
                        <div class="action_image">
                            <a href="src/delete_image.php?id=<?= $image["id"] ?>"><i class="fa-regular fa-trash-can"></i></a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </form>
</section>
<?php
include "footer.php";
?>
</div>
</div>