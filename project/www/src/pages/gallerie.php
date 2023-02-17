<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ScreensRepository.php';

$screensRepository = new ScreensRepository();
$article = $screensRepository->findAllAndUser();
?>
<div class="photo-grid">
<?php foreach ($article as $construct) {?>
    <div class="card_gallerie">
    
      <img src="img/<?= $construct['image'] ?>" />

      <div class="detail_user">
        <img id="avatar" src="img/avatar.png" alt="avatar utilisateur">
        <h4><?= $construct['pseudo'] ?></h4>
       <!--<a href="action.php?t=1&id=<? $construct['id']?>">J'aime</a>-->
      </div>

    </div>
  <?php } ?>
</div>
