<?php
session_start();
include "header.php";
require "back/connexion.php";
$sth4 = $dbco->prepare("SELECT * FROM images WHERE id_client = :id");
$sth4->execute([":id" => $_SESSION['utilisateur']['id']]);

/*Retourne un tableau associatif pour chaque entrée de notre table
        *avec le nom des colonnes sélectionnées en clefs*/
$images = $sth4->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="page_user">

    <div class="form_screen">
        <form class="form" method="post" action="src/recup_form_image.php" enctype="multipart/form-data">
            <h1>
                 Partager vos screens
            </h1>

            <p class="text">
                Merci de télécharger les screens que vous souhaitez partager avec nous.
            </p>

            <div id="image">

            <label class="btn btn--blue" for="modal-2">En savoir + </label>
                <input class="modal-state" id="modal-2" type="checkbox" />
                <div class="modal">
                    <label class="modal__bg" for="modal-2"></label>
                    <div class="modal__inner">
                        <label class="modal__close" for="modal-2"></label>
                        <h2>Modalités de partage des screens</h2>
                        <br>
                        <h3>Attention, les images doivent être :</h3>
                        <ul>
                            <li>Images libres de droits</li>
                            <li>Images libres de droits</li>
                            <li>Pas d'images à caractères sexuels, raciales...</li>
                        </ul>
                            
                        
                            <p>Les images seront étudiées avant la mise en ligne sur le site et en cas de non respect du réglement seront supprimées.</p> <br>
                   
                        
                    </div>
                </div>
              
            </div>
            <label for="file" class="label-file"><i class="fa-regular fa-image"></i>&ensp; Séléctionner vos screens</label>
            <input type="file" name='files[]' multiple id="file" class="input-file">
            <button type="submit" name="submit" class="sauvegarde" id="btn-2-next">Partager</button>

            <!--<h2>Gestion de vos screens partagés</h2>
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

            </div>-->
        </form>
    </div>

</section>

<?php
include "footer.php";
?>