<?php
session_start();
include 'header.php';
?>
<section id="html">
	<div id="logo">
		<h1><i> Inscription</i></h1>
	</div>
	<section class="container-login2">

		<form action="inscription_traitement.php" method="post">
			<div id="fade-box">
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
				<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
				<input type="email" name="email" id="username" placeholder="email" required>
				<input type="password" name="password" placeholder="Mot de passe" required>
				<input type="password" name="password_retype" placeholder="Confirmer mot de passe" required>
				<a href="login.php" class="login__forgot">Déjà un compte ? se connecter</a>
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