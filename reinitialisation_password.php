<?php
session_start();
include "header.php";
?>

<div class="login-container">
	
	<form action="src/forgot.php" method="post"  class="form-login">
         
		<ul class="login-nav">
		
			<li class="login-nav__item">
				<a href="inscription.php">Mot de passe oublié</a>
			</li>
        <p><br>Merci d'indiquer votre adresse email afin de recevoir le lien pour effectuer la réinitialisation de votre mot de passe.</p>
		</ul>
		<label for="login-input-user" class="login__label">
			Email
		</label>
		<input id="login-input-user" class="login__input" name="email" placeholder="Email" autocomplete="off" required type="text" />
		
	
		<input type="submit" value="Envoyer"></input>
	</form>
	<a href="src/password_change.php" class="login__forgot">Mot de passe oublié ?</a>
    <a href="inscription.php" class="login__forgot">Pas de compte ? s'inscrire</a>
</div>
<?php
include "footer.php";
?>
</body>
</html>