<?php
include __DIR__.'/config_test.php';
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
            $sth_article = $dbco_new->prepare("SELECT * FROM utilisateurs INNER JOIN articles ON utilisateurs.id_user = articles.id_user");
            $sth_article->execute();
            $article = $sth_article->fetchAll(PDO::FETCH_ASSOC);

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
                        $sth_article_img = $dbco_new->prepare("SELECT * FROM articles_image WHERE id_article=:id_article");
                        $sth_article_img->execute([":id_article" => $construct["id"]]);
                        $article_img = $sth_article_img->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($article_img as $construct_img) {?>
                                <?= $construct_img['name'] ?>,
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>