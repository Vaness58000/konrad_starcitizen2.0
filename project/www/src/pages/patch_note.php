<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';
$articleRepository = new ArticleRepository();
$article = $articleRepository->findAllAndTypeUser(1);

?>
<div class="patch">
<?php foreach ($article as $construct) { ?>    
	<div class="patch-card">
		<div class="patch-card__thumbnail">
			<a href="?ind=patch_ind&id=<?=$construct["id"]; ?>"><img src="img/gallerie10.jpg" alt="" /></a>
		</div>

		<div class="patch-card__content">
			<a href="?ind=patch_ind&id=<?=$construct["id"]; ?>">
				<h2 class="patch-card__title"><?= $construct['titre']; ?></h2>
			</a>

			<div class="patch-card__text">
				<p>
				<?= $construct['resume']; ?>
				</p>
			</div>

			<div class="patch-card__meta">
				<span class="patch-card__timestamp"><i class="ion-clock"></i><?= $construct['date']; ?></span>
				<span class="patch-card__auteur"> <?= $construct['pseudo'] ?></span>
			</div>
		</div>
	</div>
	<?php
    }
    ?>
	
</div>
