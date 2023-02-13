<?php
include __DIR__.'/../../repository/ArmeFpsRepository.php';
?>

<table>
        <thead>
            <tr>
                <th>nom</th>
                <th>contenu</th>
                <th>image</th>
                <th>catégorie</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $armeFpsRepository = new ArmeFpsRepository();
            $armeFps = $armeFpsRepository->findAll();
            
            foreach ($armeFps as $construct) {?>
                <tr>
                    <td><?= $construct['nom_arm'] ?></td>
                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct['contenu']) ?></div></td>
                    <td>
                        <?php 
                        $armeFps_img = $armeFpsRepository->findAllImgObj($construct["id_objet"]);

                        foreach ($armeFps_img as $construct_img) {?>
                                <?= $construct_img['name'] ?>,
                        <?php } ?>
                    </td>
                    <td><?= $construct['nom_cat'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>