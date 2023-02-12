<?php
include __DIR__.'/config_test.php';
?>

<table>
        <thead>
            <tr>
                <th>pseudo</th>
                <th>name</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sth_article = $dbco_new->prepare("SELECT * FROM utilisateurs INNER JOIN  screens ON utilisateurs.id_user =  screens.id_user");
            $sth_article->execute();
            $article = $sth_article->fetchAll(PDO::FETCH_ASSOC);

            foreach ($article as $construct) {?>
                <tr>
                    <td><?= $construct['pseudo'] ?></td>
                    <td><?= $construct['name'] ?></td>
                    <td><?= $construct['image'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>