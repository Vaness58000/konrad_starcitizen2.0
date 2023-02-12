<?php
include __DIR__.'/config_test.php';
?>

<table>
        <thead>
            <tr>
                <th>nom</th>
                <th>logo</th>
                <th>image</th>
                <th>contenu</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sth_construct = $dbco_new->prepare("SELECT * FROM constructeur");
            $sth_construct->execute();
            $construct_tab = $sth_construct->fetchAll(PDO::FETCH_ASSOC);

            foreach ($construct_tab as $construct) {?>
                <tr>
                    <td><?= $construct['nom'] ?></td>
                    <td><?= $construct['logo'] ?></td>
                    <td><?= $construct['image'] ?></td>
                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct['contenu']) ?></div></td>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>