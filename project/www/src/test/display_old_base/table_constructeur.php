<?php
include __DIR__.'/../../repository/ConstructeurRepository.php';
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
            $constructeurRepository = new ConstructeurRepository();
            $construct_tab = $constructeurRepository->findAll();

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