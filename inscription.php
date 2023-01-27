<?php
session_start();
include 'header.php';
?>
<div class="login-container2">
	<form action="inscription_traitement.php" method="post" class="form-login">

		<?php
		if (isset($_GET['reg_err'])) {
			$err = htmlspecialchars($_GET['reg_err']);

			switch ($err) {
				case 'success':
		?>
					<div class="alert_reussi">
						<strong>Succès</strong> inscription réussie ! Tu peux te connecter.
					</div>
				<?php
					break;

				case 'password':
				?>
					<div class="alert">
						<strong>Erreur</strong> Mot de passe différent
					</div>
				<?php
					break;

				case 'email':
				?>
					<div class="alert">
						<strong>Erreur</strong> Email non valide
					</div>
				<?php
					break;

				case 'email_length':
				?>
					<div class="alert">
						<strong>Erreur</strong> Email trop long
					</div>
				<?php
					break;

				case 'pseudo_length':
				?>
					<div class="alert">
						<strong>Erreur</strong> Pseudo trop long
					</div>
				<?php
				case 'already':
				?>
					<div class="alert">
						<strong>Erreur</strong> Compte déjà existant
					</div>

		<?php

			}
		}
		?>
		<ul class="login-nav">
			<li class="login-nav__item active">
				<a href="#">INSCRIPTION</a>
			</li>
			<li class="login-nav__item">
				<a href="login.php">CONNEXION</a>
			</li>
		</ul>
		<label for="login-input-user" class="login__label">
			Pseudo
		</label>
		<input id="login-input-user" class="login__input" name="pseudo" type="text" required="required" autocomplete="off" />
		<label for="login-input-user" class="login__label">
			Email
		</label>
		<input id="login-input-user" class="login__input" name="email" type="text" required="required" autocomplete="off" />
		<label for="login-input-password" class="login__label">
			Mot de passe
		</label>
		<input id="login-input-password" class="login__input" name="password" required="required" type="password" autocomplete="off" />
		<label for="login-input-password" class="login__label">
			Confirmer mot de passe
		</label>
		<input id="login-input-password" class="login__input" name="password_retype" required="required" type="password" autocomplete="off" />

		<input type="submit" value="S'inscrire"></input>
	</form>
	<a href="login.php" class="login__forgot">Déjà un compte ? se connecter</a>
</div>
<?php
include "footer.php";
?>
</body>

</html>