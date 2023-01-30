<?php
session_start();
require_once 'back/connexion.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
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
<section id="espace_client">


    <div id="info_client_general">
        <div class="info_client">
            <h3><i class="fas fa-user-circle"></i>Vos informations</h3>
            <p>Pseudo : <?php echo $data['pseudo']; ?></p>
            <p>Adresse mail : <?php echo $data['email']; ?></p>
            <div class="popup" id="popup-1">
                <div class="content">
                    <div class="close-btn" onclick="togglePopup()">
                        ×</div>

                    <form action="layouts/modif_information_client.php?id_client=<?= $data["id_client"] ?>" method="post">
                        <h3><i class="fas fa-user-circle"></i>Modifier mes informations</h3></br>

                        <div class="modif">
                            <label for='pseudo' id="label">Pseudo</label>
                            <input type="text" id="new_pseudo" name="pseudo" value="<?= $data["pseudo"] ?>" required /></br>

                        </div>
                        <div class="modif">
                            <label for='email' id="label">Email   </label>
                            <input type="email" id="new_mail" name="email" value="<?= $data["email"] ?>" required />
                        </div>

                        <button type="submit" class="sauvegarde">Sauvegarder</button>

                    </form>

                </div>
            </div>
            <button onclick="togglePopup()" class="first-button">Modifier</button>
    

        </div>
        <div class="info_client">
            <h3><i class="fa-solid fa-user-lock"></i>Votre mot de passe</h3>
            <?php
            if (isset($_GET['err'])) {
                $err = htmlspecialchars($_GET['err']);
                switch ($err) {
                    case 'current_password':
                        echo "<div class='alert alert-danger'>✘ Votre mot de passe actuel est incorrect</div>";
                        break;

                    case 'success_password':
                        echo "<div class='alert alert-success'>✔ Votre mot de passe a bien été modifié ! </div>";
                        break;
                }
            }
            ?>

            <button id="myBtn2" class="btn2">Modifier mon mot de passe</button>


            <!-- The Modal -->
            <div id="myModal2" class="modal2">

                <!-- Modal content -->
                <div class="modal-content2">
                    <span class="close2">&times;</span>
                    <form action="layouts/change_password.php" method="POST">
                        <h3><i class="fa-solid fa-user-lock"></i>Modifier mon mot de passe</h3></br>

                        <div class="modif">
                            <label for='current_password'>Mot de passe actuel</label>

                            <input type="password" id="current_password" name="current_password" required /></br>

                        </div>
                        <div class="modif">
                            <label for='new_password'>Nouveau mot de passe</label>
                            <input type="password" id="new_password" name="new_password" required /></br>

                        </div>
                        <div class="modif">
                            <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                            <input type="password" id="new_password_retype" name="new_password_retype" required /></br>

                        </div>
                        <button type="submit" class="sauvegarde">Sauvegarder</button>

                    </form>
                </div>

            </div>
            <script>
             
            </script>
        </div>
        <div class="info_client">
            <h3><i class="fa-regular fa-image"></i>Partager mes screens</h3>
            <a href="partage.php"><i class="fa-solid fa-shuttle-space"></i>&ensp; Ajouter des screens</a></br></br>
            <a href="#"><i class="fa-solid fa-shuttle-space"></i> &ensp; Gérer mes screens</a></br></br>

        </div>
        <div class="info_client">
            <h3>Une question ?</h3>
            <p><i class="fa-solid fa-comment-question"></i>Pour toutes questions, merci de remplir le formulaire de contact. Nous vous répondrons dans les meilleurs délais.</p>
            </br><a href="contact.php"><i class="fa-solid fa-shuttle-space"></i>&ensp; Nous contacter</a>
        </div>
    </div>
</section>



<script src="js/modale.js"></script>
<?php
include "footer.php";
?>
