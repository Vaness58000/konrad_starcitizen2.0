<?php
include __DIR__.'/../../repository/ArticleRepository.php';
?>

<table>
        <thead>
            <tr>
                <th>titre</th>
                <th>pseudo</th>
                <th>date</th>
                <th>resume</th>
                <th>contenu</th>
                <th>video</th>
                <th>images</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $articleRepository = new ArticleRepository();
            $article = $articleRepository->findAllAndUser();

            foreach ($article as $construct) {?>
                <tr>
                    <td><?= $construct['titre'] ?></td>
                    <td><?= $construct['pseudo'] ?></td>
                    <td><?= $construct['date'] ?></td>
                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct['resume']) ?></div></td>
                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct['contenu']) ?></div></td>
                    <td><?= $construct['video'] ?></td>
                    <td>
                        <?php 
                        $article_img = $articleRepository->findAllImgArticle($construct["id"]);

                        foreach ($article_img as $construct_img) {?>
                                <?= $construct_img['name'] ?>,
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>