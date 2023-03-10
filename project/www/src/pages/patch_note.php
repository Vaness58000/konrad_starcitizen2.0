<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';
require __DIR__ . '/../../src/repository/UsersRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 3;
$articleRepository = new ArticleRepository();
$type = $articleRepository->findIdTypeArticle("patch_note");
//$article = $articleRepository->findAllAndTypeUser($type);
$usersRepository = new UsersRepository();
$nomb = $articleRepository->findAllAndTypeUserCount($type);

$nomb_page = ceil($nomb / $nomb_art);

$article = $articleRepository->findAllAndTypeUserPage($type, $pg, $nomb_art);
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
					<p style="height: 120px; overflow:hidden; margin-bottom: 20px;">
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
<ul class="pagination">
	<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=patch_note&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>