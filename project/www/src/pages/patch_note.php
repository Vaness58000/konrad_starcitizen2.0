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
				<a href="?ind=patch_ind&id=<?= $construct["id"]; ?>">
					<?php
					$article_img = $articleRepository->findAllImgArticle($construct["id"]);
					if (count($article_img) >= 1) {
					?>
						<img src="img/<?= $article_img[0]['name'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

					<?php } ?>
			</div>

			<div class="patch-card__content">
				<a href="?ind=patch_ind&id=<?= $construct["id"]; ?>">
					<h2 class="patch-card__title"><?= $construct['titre']; ?></h2>
				</a>

				<div class="patch-card__text">
					<p>
						<?= $construct['resume']; ?>
					</p>
				</div>

				<div class="patch-card__meta">

					<span class="patch-card__auteur"><a href="?ind=streamer_ind"><img src="img/avatar.png"><?= $construct['pseudo'] ?></a></span>
					<span class="patch-card__timestamp"><i class="ion-clock"></i><?= date('d/m/Y', strtotime($construct['date'])); ?></span>
				</div>
			</div>
		</div>
	<?php
	}
	?>

</div>