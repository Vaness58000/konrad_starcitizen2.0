<?php
session_start();
include "header.php";
?>

<div class="login-container">
	
	<form action="connexion.php" method="post"  class="form-login">
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
		<ul class="login-nav">
			<li class="login-nav__item active">
				<a href="#">CONNEXION</a>
			</li>
			<li class="login-nav__item">
				<a href="inscription.php">INSCRIPTION</a>
			</li>
		</ul>
		<label for="login-input-user" class="login__label">
			Email
		</label>
		<input id="login-input-user" class="login__input" name="email" type="text" required="required" autocomplete="off"/>
		<label for="login-input-password" class="login__label">
			Mot de passe
		</label>
		<input id="login-input-password" class="login__input" name="password" required="required" type="password" autocomplete="off"/>
	
		<input type="submit" value="Se connecter"></input>
	</form>
	<a href="reinitialisation_password.php" class="login__forgot">Mot de passe oublié ?</a>
    <a href="inscription.php" class="login__forgot">Pas de compte ? s'inscrire</a>
</div>
<?php
include "footer.php";
?>
</body>
</html>
