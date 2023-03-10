<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/UsersRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 3;
$usersRepository = new UsersRepository();
$nomb = $usersRepository->findAllAndUserCount();
$nomb_page = ceil($nomb / $nomb_art);

$users = $usersRepository->findAllAndUserPage($pg, $nomb_art);

?>

<div class="wrapper_profil">

    <?php foreach ($users as $streamer) { ?>
        <div class="profile-card -profile-card">
            <div class="profile-card__img">
                <?php
                        $user = $usersRepository->findAllUserAvatarId($streamer["idUser"]);
                        if (count($user) <= 0) { ?>
                            <img src="src/img/avatar.png" alt="<?= $streamer['pseudo'] ?>" />

                        <?php } else if (count($user) >= 1) { ?>
                            <img src="upload/<?= $user["src"] ?>" alt="avatar de <?= $streamer['pseudo'] ?>" />
                        <?php } ?>
                <img src="src/img/avatar.png" alt="profile card">
            </div>

            <div class="profile-card__cnt -profile-cnt">
                <div class="profile-card__name">
                    <?= $streamer['pseudo'] ?></div>
                <div class="profile-card__txt">Streamer <strong>Star Citizen</strong></div>

                <div class="profile-card-inf">

                    <div class="profile-card-inf__item">
                      
                        <div class="profile-card-inf__txt">123 articles</div>
                    </div>


                </div>

                <div class="profile-card-social">
                    <a href="#" class="profile-card-social__item twitch" target="_blank">
                        <span class="icon-font">
                            <i class="fab fa-twitch"></i>
                        </span>
                    </a>

                    <a href="#" class="profile-card-social__item discord" target="_blank">
                        <span class="icon-font">
                            <i class="fab fa-discord"></i>
                        </span>
                    </a>

                    <a href="#" class="profile-card-social__item instagram" target="_blank">
                        <span class="icon-font">
                            <i class="fa fa-instagram"></i>
                        </span>
                    </a>

                    <a href="#" class="profile-card-social__item twitter" target="_blank">
                        <span class="icon-font">
                            <i class="fa fa-twitter"></i>
                        </span>
                    </a>

                    <a href="#" class="profile-card-social__item youtube " target="_blank">
                        <span class="icon-font">
                            <i class="fa fa-youtube"></i>
                        </span>
                    </a>
                </div>

                <div class="profile-card-ctr">
                    <a href="?ind=streamer_ind&id=<?= $streamer["idUser"] ?>" class="profile-card__button button--blue -message-btn">Articles</a>
                    <a href="?ind=streamer_ind&id=<?= $streamer["idUser"] ?>" class="profile-card__button button--orange">A propos</a>
                </div>
            </div>

        </div>
<?php } ?>

</div>
<ul class="pagination">
	<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=gameplay&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>