<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/UsersRepository.php';
$usersRepository = new UsersRepository();
$users = $usersRepository->findAll();

?>

<div class="wrapper_profil">

    <?php foreach ($users as $streamer) { ?>
        <div class="profile-card -profile-card">
            <div class="profile-card__img">
                <?php
                        //$user = $usersRepository->findAllUserAvatarId($streamer["id_user"]);
                        /*if (count($user) <= 0) { ?>
                            <img src="src/img/avatar.png" alt="<?= $streamer['pseudo'] ?>" />

                        <?php } else if (count($user) >= 1) { ?>
                            <img src="upload/<?= $user["src"] ?>" alt="avatar de <?= $streamer['pseudo'] ?>" />
                        <?php } */?>
                <img src="src/img/avatar.png" alt="profile card">
            </div>

            <div class="profile-card__cnt -profile-cnt">
                <div class="profile-card__name">
                    <?= $streamer['pseudo'] ?></div>
                <div class="profile-card__txt">Streamer <strong>Star Citizen</strong></div>

                <div class="profile-card-inf">

                    <div class="profile-card-inf__item">
                        <div class="profile-card-inf__title">123</div>
                        <div class="profile-card-inf__txt">Articles</div>
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
                    <a href="?ind=streamer_ind&id=<?= $streamer["id_user"] ?>" class="profile-card__button button--blue -message-btn">Articles</a>
                    <a href="?ind=streamer_ind&id=<?= $streamer["id_user"] ?>" class="profile-card__button button--orange">A propos</a>
                </div>
            </div>

        </div>
<?php } ?>

</div>