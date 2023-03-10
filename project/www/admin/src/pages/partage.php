<?php
require __DIR__ . '/../../../back/connexion.php';
include __DIR__.'/../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
$sth4 = $dbco->prepare("SELECT * FROM images WHERE id_client = :id");
$sth4->execute([":id" => $sessionUser->getId()]);

/*Retourne un tableau associatif pour chaque entrée de notre table
        *avec le nom des colonnes sélectionnées en clefs*/
$images = $sth4->fetchAll(PDO::FETCH_ASSOC);


// On récupere les données de l'utilisateur
$req = $dbco->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch(PDO::FETCH_ASSOC);

$templatePage = new TemplatePage(__DIR__.'/../template/partage.html');
$templatePage->addVarString("[#CITIZEN_USER_PSEUDO#]", $data['pseudo']);

/*$js = $templatePage->js();
$css = $templatePage->css();
$contenu = $templatePage->html();*/

/*?>
<section id="page_user">
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
                <div class="form_screen">
                    <form class="form" method="post" action="./../../recup_form_image.php" enctype="multipart/form-data">
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
                                        <li>Pas d'images à caractères sexuels, raciales...</li>
                                    </ul>


                                    <p>Les images seront étudiées avant la mise en ligne sur le site et en cas de non respect du réglement seront supprimées.</p> <br>


                                </div>
                            </div>

                        </div>

                        <input type="file" name='files[]' id="file" class="input-file">
                        <button type="submit" name="submit" class="sauvegarde" id="btn-2-next">Partager</button>
                </div>
            </div>
        </div>
    </div>


</section>*/