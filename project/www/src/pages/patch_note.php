<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';
require __DIR__ . '/../../src/repository/UsersRepository.php';
$articleRepository = new ArticleRepository();
$article = $articleRepository->findAllAndTypeUser(1);
$usersRepository = new UsersRepository();

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
						<img src="src/img/<?= $article_img[0]['name'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

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
					<div>
						<span class="patch-card__timestamp"><i class="fas fa-calendar-alt mr-2"></i> <?= date('d/m/Y', strtotime($construct['date'])); ?></span>
					</div>
					<ul class="postcard__tagbox">
						<li class="tag__item"><a href="?ind=patch_note">Patch Notes</a></li>

						<li class="tag__item auteur blue">
							<a href="?ind=streamer_ind&id=<?= $construct["id_user"] ?>">Publié par <?= $construct['pseudo'] ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	<?php
	}
	?>

</div>