<?php
require __DIR__.'/../../../back/connexion.php';
// Si les variables existent et qu'elles ne sont pas vides
if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    // Patch XSS  signifie cross-site scripting. C’est une sorte d’attaque où un pirate injecte du code client malveillant dans la sortie d’une page Web.
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // On vérifie si l'utilisateur existe
    $check = $dbco->prepare('SELECT pseudo, email password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..

    // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
    if ($row == 0) {
        if (strlen($pseudo) <= 100) { // On verifie que la longueur du pseudo <= 100
            if (strlen($email) <= 100) { // On verifie que la longueur du mail <= 100
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Si l'email est de la bonne forme
                    if ($password === $password_retype) { // si les deux mdp saisis sont bon

                        // On hash le mot de passe avec PASSWORD ARGONI2I, 

                        $password = password_hash($password, PASSWORD_ARGON2I);

                        // On stock l'adresse IP
                        $ip = $_SERVER['REMOTE_ADDR'];


                        // On insère dans la base de données
                        $insert = $dbco->prepare("INSERT INTO utilisateurs(pseudo, email, password, ip, token) VALUES(:pseudo, :email, :password, :ip, :token)");
                        $insert->execute(array(
                            'pseudo' => $pseudo,
                            'email' => $email,
                            'password' => $password,
                            'ip' => $ip,
                            'token' => bin2hex(openssl_random_pseudo_bytes(64))
                        )); //bin2hex pour convertir une valeur de chaîne binaire en hexadécimal - openssl_random_pseudo_bytes ==pour générer u chaîne aléatoire
                        //on recupére l'id du nouvel utilisateur
                        $id = $dbco->lastInsertId();

                        // On redirige avec le message de succès
                        header('Location: ?ind=login&login_err=success');
                        die();
                    } else {
                        header('Location: ?ind=inscription&reg_err=password');
                        die();
                    }
                } else {
                    header('Location: ?ind=inscription&reg_err=email');
                    die();
                }
            } else {
                header('Location: ?ind=inscription&reg_err=email_length');
                die();
            }
        } else {
            header('Location: ?ind=inscription&reg_err=pseudo_length');
            die();
        }
    } else {
        header('Location: ?ind=inscription&reg_err=already');
        die();
    }
}
