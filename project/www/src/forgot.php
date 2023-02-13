<?php
require_once __DIR__ . '../../back/connexion.php';
include __DIR__ . "/message_email.php";
if (!empty($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);

    $check = $dbco->prepare('SELECT token FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();  // si il est égal à 0 on est pas dans la base de données sinon = 1 on est dans la base de donnée

    if ($row) {
        $token = bin2hex(openssl_random_pseudo_bytes(24));
        $token_user = $data['token']; // attention longueur du token : 128, prevoyez un varchar 130 dans votre table si vous utilisez les tokens du système d'inscription

        $insert = $dbco->prepare('INSERT INTO password_recover(token_user, token) VALUES(?,?)');
        $insert->execute(array($token_user, $token));

        $link = 'konrad_starcitizen2.0.test/src/recover.php?u=' . base64_encode($token_user) . '&token=' . base64_encode($token);

        message_email($_POST['email'], 'noreply@konrad_starcitizen.tld', 'Réinitialisation du mot de passe', '<h1>Réinitialisation de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, veuillez suivre ce lien : <a href=' . $link . '>' . $link . '</a></p>');
        // $retour = mail('vanessa.geoffroid@gmail.com', 'Envoi depuis la page index', $_POST['message'], 'From: '.$_POST['email']);

        //$retour = mail('destinataire@free.fr', 'Envoi depuis la page Contact', $_POST['message'], 'From: webmaster@monsite.fr');

        /* $to = $_POST["email"];
            $subject = 'Réinitialisation de votre mot de passe';
            $message = '<h1>Réinitialisation de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, veuillez suivre ce lien : <a href="'.$link.'">'.$link.'</a></p>';
            //defini les entête requis
            $header = [];
            $headers[] = 'MIME-Version 1.0';
            $headers[] = 'Content-type: text/hmtl; charset=iso-8859-1';
            $headers[] = 'To: '.$to.' <'.$to.'>';
            $headers[] = 'Winstema <info@winstema.tld>';
            //envoie du mail
            mail($to,$subject, $message, implode("\r\n", $headers));*/
        // $message = '<div style="color: green;"> Un courriel a été acheminé. Veuillez regarder votre boite mail et suivre les instructions à l\'intérieur du courriel.</div>';
        header("Location: ../login.php?login_err=forgot");
        die();
    } else {
        echo "Compte non existant";
        header('Location: ../index.php');
        die();
    }
}
?>
<script type="text/javascript">
    alert("Votre message a bien été envoyé");
    window.location.href = "index.php";
</script>
<?php
