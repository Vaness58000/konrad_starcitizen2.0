<?php
require __DIR__.'/../../../back/connexion.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
{
    // Patch XSS
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $email = strtolower($email); // email transformé en minuscule

    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
    $check = $dbco->prepare('SELECT * FROM utilisateurs WHERE (email = :email OR pseudo = :email)');
    $check->execute([":email" => $email]);
    $data = $check->fetch(PDO::FETCH_ASSOC);
    $row = $check->rowCount();
    
    // Si > à 0 alors l'utilisateur existe
    if ($row > 0) {
        // Si le mail est bon niveau format
        //if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Si le mot de passe est le bon
            if (password_verify($password, $data['password'])) {
                // On créer la session et on redirige sur espace_client.php
                $_SESSION['user'] = $data['token'];
                $_SESSION['utilisateur'] = [
                    "id" => $data["id_client"],
                    "pseudo" => $data["pseudo"]
                ];


                header('Location: admin/?ind=espace_user');
                //die();
            } else {
                header('Location: ?ind=login&login_err=password');
                //die();
            }
        /*} else {
            header('Location: login.php?login_err=email');
            //die();
        }*/
    } else {
        header('Location: ?ind=login&login_err=already');
        //die();
    }
} else {
    header('Location: .');
    //die();
} // si le formulaire est envoyé sans aucune données
