<?php
require __DIR__.'/../../../back/connexion.php';
?>
<section id="html">
	<div id="logo">
		<h1><i>RĂ©initialisation</i></h1>
	</div>
	<section class="container-login">

		<form action="src/forgot.php" method="post">
			<div id="fade-box">
				<p>Merci d'indiquer votre adresse email afin de recevoir le lien pour effectuer la rĂ©initialisation de votre mot de passe.</p>
				<input type="email" name="email" id="username" placeholder="email" required>
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
