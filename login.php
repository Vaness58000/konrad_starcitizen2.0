<?php
session_start();
include "header.php";
?>
<section id="html">
    <div id="logo">
        <h1><i> Connexion</i></h1>
    </div>
    <section class="stark-login">

        <form action="connexion.php" method="post">
            <div id="fade-box">
                <?php
                if (isset($_GET['login_err'])) {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch ($err) {
                        case 'password':
                ?>
                            <div class="alert">
                                <strong>Erreur</strong> email et/ou mot de passe incorrect.
                            </div>
                        <?php
                            break;

                        case 'email':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> email et/ou mot de passe incorrect.
                            </div>
                        <?php
                            break;

                        case 'succes':
                        ?>
                            <div class="alert" style="color: green">
                                <strong>Succès</strong> Mot de passe réinitialisé.
                            </div>
                        <?php
                            break;
                        case 'success':
                        ?>
                            <div class="alert" style="color: green">
                                <strong>Succès</strong> Inscription réussie ! Tu peux te connecter.
                            </div>
                        <?php
                            break;

                        case 'already':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                            break;

                        case 'forgot':
                        ?>
                            <div class="success" style="color: green">
                                <strong>Email</strong> pour réinitialisation envoyé.
                            </div>
                <?php
                            break;
                    }
                }
                ?>
                <input type="email" name="email" id="username" placeholder="email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <a href="reinitialisation_password.php" class="login__forgot">Mot de passe oublié ?</a>
                <a href="inscription.php" class="login__forgot">Pas de compte ? s'inscrire</a>
                <input type="submit" value="Se connecter"></input>
            </div>
        </form>

    </section>

    <div id="circle1">
        <div id="inner-cirlce1">
            <h2> </h2>
        </div>
    </div>

</section>

<?php
include "footer.php";
?>
</body>

</html>